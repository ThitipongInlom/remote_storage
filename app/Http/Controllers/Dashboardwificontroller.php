<?php

namespace App\Http\Controllers;

use Config;
use stdClass;
use App\Model\wifi as wifi;
use App\Model\wifidb as wifidb;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;

class Dashboardwificontroller extends Controller
{
    public function Ajax_Table_Main(Request $request)
    {
        if ($request->post('select_type') == 'wifi_wait') {
            $data = wifi::where('wifi_status', 'Wait')->get();
        }else if ($request->post('select_type') == 'wifi_complete') {
            $data = wifi::where('wifi_status', 'Complete')->get();
        }else {
            $data = wifi::get();
        }

        return Datatables::of($data)
        ->setRowClass(function ($data) {
            if ($data->wifi_status == 'Complete') {
                $str_class = "bg-success";
            }else {
                $str_class = "bg-secondary";
            }
            return $str_class;
        })
        ->editColumn('wifi_hotel', function($data) {
            return Str::ucfirst($data->wifi_hotel);
        })
        ->editColumn('wifi_date_start', function($data) {
            return date('d/m/Y', strtotime($data->wifi_date_start));
        })
        ->editColumn('wifi_date_end', function($data) {
            return date('d/m/Y', strtotime($data->wifi_date_end));
        })
        ->addColumn('action', function ($data) {
            $btn_edit = "<button class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> แก้ไข</button>";
            $btn_del  = "<button class='btn btn-sm btn-danger'><i class='fas fa-trash'></i> ลบ</button>";
            return $btn_edit.' '.$btn_del;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function Save_add_data_modal(Request $request)
    {
        // Insert ข้อมูลลง DB
        $wifi = new wifi;
        $wifi->wifi_group               = $request->group_name;
        $wifi->wifi_hotel               = $request->select_hotel;
        $wifi->wifi_username            = $request->username;
        $wifi->wifi_password            = $request->password;
        $wifi->wifi_date_start          = $request->datepicker_start;
        $wifi->wifi_date_end            = $request->datepicker_end;
        $wifi->wifi_status              = 'Wait';
        $wifi->wifi_line_alert_coming   = '1';
        $wifi->wifi_line_alert_generate = '1';
        $wifi->save();

        return response()->json(['tag' => 'success',
                                 'text' => 'บันทึกข้อมูลเสร็จสิ้น']);
    }

    public function Generate_wifi_group(Request $request)
    {
        $day_generate = date('Y-m-d');
        $day_coming = date('Y-m-d', strtotime("+1 day", strtotime(now())));
        $wifi_wait = wifi::where('wifi_status', 'Wait')->get();
        $user_generage = $wifi_wait->where('wifi_date_start', $day_generate);
        $user_coming = $wifi_wait->where('wifi_date_start', $day_coming);

        // Token TEST // R4jIdOn7GWxWohFgJlMP4fzsirKKu5Y3XMMYn69E4kK
        $token = "R4jIdOn7GWxWohFgJlMP4fzsirKKu5Y3XMMYn69E4kK";

        // แจ้ง Line ก่อน 1 วัน
        if (isset($user_coming)) {
            foreach ($user_coming as $key => $row) {
                if ($row->wifi_line_alert_coming == '1') {
                    // ตั้งค่า Line
                    $set_code = '0';
                    $message  = $this->Set_message_line($row->wifi_group,$row->wifi_username,$row->wifi_password,$row->wifi_date_start,$row->wifi_date_end,$row->wifi_hotel,$set_code);
                    // ส่ง Line
                    $this->Send_Line_Alert($token, $message);
                    // อัพเดตข้อมูลว่าส่ง Line เตือน แล้ว
                    $wifi = wifi::find($row->wifi_id);
                    $wifi->wifi_line_alert_coming = '0';
                    $wifi->save();
                }
            }
        }

        // แจ้ง Line และสร้าง Wifi
        if (isset($user_generage)) {
            foreach ($user_generage as $key => $row) {
                if ($row->wifi_line_alert_generate == '1') {
                    // สร้่าง Wifi
                    $complete = $this->Generate_wifi($row->wifi_group,$row->wifi_username,$row->wifi_password,$row->wifi_date_start,$row->wifi_date_end,$row->wifi_hotel,$token);
                    // อัพเดตข้อมูลว่าส่ง Line เตือน แล้ว
                    if ($complete->status == 'Complete') {
                        $wifi = wifi::find($row->wifi_id);
                        $wifi->wifi_status = 'Complete';
                        $wifi->wifi_note = $complete->message;
                        $wifi->wifi_line_alert_generate = '0';
                        $wifi->save();
                    }
                }
            }
        }
    }

    public function Generate_wifi($wifi_group,$user,$pass,$date_start,$date_end,$hotel,$token)
    {
        // เช็คว่ามี Username ใน Airlink หรือ ไม่  
        // ถ้ามี username ในระบบ ค่าเท่ากับ 1
        // ถ้าไม่มี username ในระบบ ค่าเท่ากับ 0
        $wifi_db_type = $this->Set_DB_Airlink($hotel,$token);
        if ($wifi_db_type == 'airlink') {
            // ถ้าเป็นประเภท airlink
            $this->Generate_wifi_airlink($user,$pass,$date_start,$date_end,$hotel);
            $set_code = '1';
            $message = $this->Set_message_line($wifi_group,$user,$pass,$date_start,$date_end,$hotel,$set_code);
            $this->Send_Line_Alert($token, $message);
            $complete_data = new stdClass;
            $complete_data->status = "Complete";
            $complete_data->message = $message;
            $complete = $complete_data;
        }else if ($wifi_db_type == 'neogate') {
            // ถ้าเป็นประเภท neogate
            $this->Generate_wifi_neogate($user,$pass,$date_start,$date_end,$hotel);
            $set_code = '1';
            $message = $this->Set_message_line($wifi_group,$user,$pass,$date_start,$date_end,$hotel,$set_code);
            $this->Send_Line_Alert($token, $message);
            $complete_data = new stdClass;
            $complete_data->status = "Complete";
            $complete_data->message = $message;
            $complete = $complete_data;
        }else{
            // ถ้าไม่มีประเภท ไม่มีการสร้าง wifi
            $set_code = '2';
            $message = $this->Set_message_line($wifi_group,$user,$pass,$date_start,$date_end,$hotel,$set_code);
            $this->Send_Line_Alert($token, $message);
            $complete_data = new stdClass;
            $complete_data->status = "error";
            $complete_data->message = $message;
            $complete = $complete_data;
        }
        DB::disconnect('apimysql');
        return $complete;
    }

    public function Set_DB_Airlink($hotel,$token)
    {
        // ดึงข้อมูลของโรงแรมนั้นๆ จากตัวแปร $hotel
        $data = wifidb::where('wifi_db_hotel', $hotel)->get();
        // ตั้งค่า API DB เป็นของแต่ล่ะโรงแรม
        foreach ($data as $key => $row) {
            Config::set("database.connections.apimysql.driver" , "$row->wifi_db_driver");
            Config::set("database.connections.apimysql.host" , "$row->wifi_db_host");
            Config::set("database.connections.apimysql.port" , "$row->wifi_db_port");
            Config::set("database.connections.apimysql.database" , "$row->wifi_db_database");
            Config::set("database.connections.apimysql.username" , "$row->wifi_db_username");
            Config::set("database.connections.apimysql.password" , "$row->wifi_db_password");
            $wifi_db_type = $row->wifi_db_type;
        }
        // เช็ค การเข้าถึง DB ของแต่ล่ะโรงแรม
        try {
            DB::connection('apimysql')->getPdo();
            return $wifi_db_type;
        } catch (\Exception $e) {
            return 'error';
        }
    }

    public function Generate_wifi_airlink($user,$pass,$date_start,$date_end,$hotel)
    {
        $voucher_count = DB::connection('apimysql')->table("voucher")->where('username', $user)->count();
        // ดึงข้อมูลจาก Group wifi
        $Valid = date("Y-m-d",strtotime($date_end))."T23:59:59";
        $Expired = strftime("%B %d %Y",strtotime($date_end))." 23:59:59";
        $Profile = $this->Set_Data_Profile($user);
        $Data_Billingplan = DB::connection('apimysql')->table("billingplan")->where('name', 'Meeting')->get();
        foreach ($Data_Billingplan as $key => $row) {
            $Group = $row->groupname;
            $Ggroupname = $row->name;
            $Up = $row->bw_upload;
            $Down = $row->bw_download;
            $Re_url = $row->redirect_url;
            $Idle = $row->IdleTimeout;
            $Billplan = $row->name;
        }
        // ถ้ามี username ไม่ต้องสร้าง wifi ใหม่
        if ($voucher_count > 0) {
            // ลบข้อมูลจาก username จาก Table radcheck
            DB::connection('apimysql')->table("radcheck")->where('username' , $user)->delete();
            // เพิ่มข้อมูล username จาก radcheck
            DB::connection('apimysql')->table("radcheck")->insert([
                ['username' => $user, 'attribute' => 'Password', 'op' => ':=', 'value' => $pass],
                ['username' => $user, 'attribute' => 'Expiration', 'op' => ':=', 'value' => $Expired],
                ['username' => $user, 'attribute' => 'Auth-Type', 'op' => ':=', 'value' => 'Local']]);
            // เปลี่ยนวันที่ใหม่
            DB::connection('apimysql')->table('voucher')->where('username', $user)
                ->update(['valid_until' => $Valid]);
        }else {
            // ลบข้อมูลจาก username จาก Table radcheck
            DB::connection('apimysql')->table("radcheck")->where('username' , $user)->delete();
            // เพิ่มข้อมูล username จาก radcheck
            DB::connection('apimysql')->table("radcheck")->insert([
                ['username' => $user, 'attribute' => 'Password', 'op' => ':=', 'value' => $pass],
                ['username' => $user, 'attribute' => 'Expiration', 'op' => ':=', 'value' => $Expired],
                ['username' => $user, 'attribute' => 'Auth-Type', 'op' => ':=', 'value' => 'Local']]);
            // ลบข้อมูลจาก username จาก Table radreply
            DB::connection('apimysql')->table("radreply")->where('username' , $user)->delete();
            // เพิ่มข้อมูล username จาก radreply
            DB::connection('apimysql')->table("radreply")->insert([
                ['username' => $user, 'attribute' => 'WISPr-Bandwidth-Max-Down', 'op' => ':=', 'value' => $Down],
                ['username' => $user, 'attribute' => 'WISPr-Bandwidth-Max-Up', 'op' => ':=', 'value' => $Up],
                ['username' => $user, 'attribute' => 'WISPr-Redirection-URL', 'op' => ':=', 'value' => $Re_url]]);
            // ลบข้อมูลจาก username จาก Table radusergroup
            DB::connection('apimysql')->table("radusergroup")->where('username' , $user)->delete();
                // เพิ่มข้อมูล username จาก radusergroup
            DB::connection('apimysql')->table("radusergroup")->insert([
                ['username' => $user, 'groupname' => $Group, 'priority' => '1']]);
            // เพิ่มข้อมูล username จาก voucher
            DB::connection('apimysql')->table("voucher")->insert([ 
                ['username' => $user,
                 'password' => $pass,
                 'billingplan' => $Billplan,
                 'created_by' => 'Auto Wifi comment',
                 'IdleTimeout' => $Idle,
                 'valid_until' => $Valid,
                 'isprinted' => '0',
                 'profile' => $Profile,
                 'encryption' => 'clear',
                 'money' => '0'
                ]]);
        }
        return;
    }

    public function Generate_wifi_neogate($user,$pass,$date_start,$date_end,$hotel)
    {
        $voucher_count = DB::connection('apimysql')->table("radacctprofile")->where('acc_user', $user)->count();
        // ดึงข้อมูลจาก Group wifi
        $Valid = date("Y-m-d",strtotime($date_end))." 23:59:59";
        $Expired = strftime("%B %d %Y",strtotime($date_end))." 23:59:59";
        $Data_Billingplan = DB::connection('apimysql')->table("radgroupprofile")->where('group_name', 'Meeting')->get();
        foreach ($Data_Billingplan as $key => $row) {
            $Group = $row->group_name;
            $Ggroupname = $row->group_name;
            $Up = $row->group_upload;
            $Down = $row->group_download;
            $Re_url = $row->group_redirect;
            $Idle = $row->group_idletimeout;
            $Billplan = $row->group_name;
        }
        // ถ้ามี username ไม่ต้องสร้าง wifi ใหม่
        if ($voucher_count > 0) {
            // ลบข้อมูลจาก username จาก Table radcheck
            DB::connection('apimysql')->table("radcheck")->where('username' , $user)->delete();
            // เพิ่มข้อมูล username จาก radcheck
            DB::connection('apimysql')->table("radcheck")->insert([
                ['username' => $user, 'attribute' => 'Password', 'op' => ':=', 'value' => $pass],
                ['username' => $user, 'attribute' => 'Expiration', 'op' => ':=', 'value' => $Expired],
                ['username' => $user, 'attribute' => 'Auth-Type', 'op' => ':=', 'value' => 'Local']]);
            // เปลี่ยนวันที่ใหม่
            DB::connection('apimysql')->table('radacctprofile')->where('acc_user', $user)
                ->update(['acc_expire' => $Valid]);
        }else {
            // ลบข้อมูลจาก username จาก Table radcheck
            DB::connection('apimysql')->table("radcheck")->where('username' , $user)->delete();
            // เพิ่มข้อมูล username จาก radcheck
            DB::connection('apimysql')->table("radcheck")->insert([
                ['username' => $user, 'attribute' => 'Password', 'op' => ':=', 'value' => $pass],
                ['username' => $user, 'attribute' => 'Expiration', 'op' => ':=', 'value' => $Expired],
                ['username' => $user, 'attribute' => 'Auth-Type', 'op' => ':=', 'value' => 'Local']]);
            // ลบข้อมูลจาก username จาก Table radreply
            DB::connection('apimysql')->table("radreply")->where('username' , $user)->delete();
            // เพิ่มข้อมูล username จาก radreply
            DB::connection('apimysql')->table("radreply")->insert([
                ['username' => $user, 'attribute' => 'WISPr-Bandwidth-Max-Down', 'op' => ':=', 'value' => $Down],
                ['username' => $user, 'attribute' => 'WISPr-Bandwidth-Max-Up', 'op' => ':=', 'value' => $Up],
                ['username' => $user, 'attribute' => 'WISPr-Redirection-URL', 'op' => ':=', 'value' => $Re_url]]);
            // ลบข้อมูลจาก username จาก Table radusergroup
            DB::connection('apimysql')->table("radusergroup")->where('username' , $user)->delete();
                // เพิ่มข้อมูล username จาก radusergroup
            DB::connection('apimysql')->table("radusergroup")->insert([
                ['username' => $user, 'groupname' => $Group, 'priority' => '1']]);
            // เพิ่มข้อมูล username จาก voucher
            DB::connection('apimysql')->table("radacctprofile")->insert([ 
                ['acc_user'    => $user,
                 'acc_pass'    => $pass,
                 'acc_first'   => 'Group',
                 'acc_last'    => $user,
                 'acc_type'    => 'ADD',
                 'acc_group'   => $Group,
                 'acc_expire'  => $Valid,
                 'acc_idle'    => $Idle,
                 'acc_price'   => '0',
                 'acc_addby'   => 'Auto Wifi comment',
                 'acc_adddate' => now(),
                 'acc_status'  => '1'
                ]]);
        }
        return;
    }

    public function Set_Data_Profile($Name)
    {
        $post_data = '';
        // Set Array
        $post_data = array();
        $user_data['firstname']     = $Name;
        $user_data['lastname']      = '';
        $user_data['surename']      = '';
        $user_data['gender']        = '';
        $user_data['billingplan']   = 'Meeting';
        $user_data['money']         = 0;
        $user_data['ip']            = '';
        $user_data['mac']           = '';
        $user_data['web']           = '';
        $user_data['personal_id']   = '';
        $user_data['phone']         = '';
        $user_data['email']         = '';
        $user_data['address1']      = '';
        $user_data['address2']      = '';
        $user_data['district']      = '';
        $user_data['amphur']        = '';
        $user_data['province']      = '';
        $user_data['note']          = '';
        $user_data['pic_upload']    = '';
        $profile = serialize($user_data);
        return $profile;
    }

    public function Set_message_line($wifi_group,$user,$pass,$date_start,$date_end,$hotel,$set_code)
    {
        // $set_code ถ้ามีค่าเท่ากับ 0 จะเป็นการเซ็ตค่า เพื่อให้แจ้งเตือน ก่อนล่วงหน้า 1 วันก่อนการสร้างจริง
        // $set_code ถ้ามีค่าเท่ากับ 1 จะเป็นการเซ็ตค่า เพื่อให้แจ้งเตือน ว่าได้สร้าง wifi เรียบร้อยแล้ว
        // $set_code ถ้ามีค่าเท่ากับ 2 จะเป็นการเซ็ตค่า เพื่อให้แจ้งเตือน ว่า ไม่สามารถติดต่อ ฐานข้อมูลของแต่ล่ะโรงแรมได้
        if ($set_code == '0') {
            // ตั้งค่า Line
            $message  = "แจ้งเตือน ก่อนสร้าง 1 วัน \n";
            $message .= "แจ้งเตือน: ".date('d/m/Y h:i:s', strtotime(now()))." \n";
            $message .= "ชื่อกรุ๊ป: $wifi_group \n";
            $message .= "Username: $user \n";
            $message .= "Password: $pass \n";
            $message .= "จากวันที่: ".date('d/m/Y', strtotime($date_start))." - ".date('d/m/Y', strtotime($date_end))." \n";
            $message .= "สถานะ: รอสร้าง \n";
        }else if ($set_code == '1') {
            // ตั้งค่า Line
            $message  = "แจ้งเตือน หลังจากสร้าง Wifi \n";
            $message .= "สร้างวันที่: ".date('d/m/Y h:i:s', strtotime(now()))." \n";
            $message .= "ชื่อกรุ๊ป: $wifi_group \n";
            $message .= "Username: $user \n";
            $message .= "Password: $pass \n";
            $message .= "วันที่: ".date('d/m/Y', strtotime($date_start))." - ".date('d/m/Y', strtotime($date_end))." \n";
            $message .= "สถานะ: สร้างแล้ว \n";              
        }else if ($set_code == '2') {
            // ตั้งค่า Line
            $message  = "แจ้งเตือน หลังจากสร้าง Wifi \n";
            $message .= "ไม่สามารถติดต่อDBของ $hotel ได้ \n";
        }

        return $message;
    }

    public function Send_Line_Alert($token, $message)
    {
        // token == ตัว token ของ Line
        // message == คือ ข้อมความที่จะแสดงใน Line
        $Line = curl_init();
        curl_setopt( $Line, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt( $Line, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $Line, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $Line, CURLOPT_POST, 1);
        curl_setopt( $Line, CURLOPT_POSTFIELDS, "message=$message");
        curl_setopt( $Line, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token");
        curl_setopt($Line, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($Line, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($Line);
        if(curl_error($Line)) { 
            echo 'error:' . curl_error($Line);
        }else { 
            $result_ = json_decode($result, true);
            echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        }
        curl_close($Line);
    }

}
