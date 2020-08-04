<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Model\Battery as Battery;
use App\Model\Hotel as Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use App\Model\ChangeHistory as ChangeHistory;

class Dashboardbatterycontroller extends Controller
{
    public function View_Dashboardbattery(Request $request)
    {
        return view('page/dashboardbattery', [
            'Hotel' => Hotel::get()
        ]);
    }

    public function Ajax_Table_Main(Request $request)
    {
        $type  = $request->post('type_select_table');
        $hotel = $request->post('hotel_select_table');
        switch ($type) {
            case 'return_yes':
                $users = DB::table('battery')->where('battery_end', '<', Carbon::now())->get();
                break;
            case 'return_no':
                $users = DB::table('battery')->where('battery_end', '>', Carbon::now())->get();
                break;        
            default:
                if ($hotel == 'thezign') {
                    $users = DB::table('battery')->where('battery_hotel', 'Thezign')->get();
                }else if ($hotel == 'tsix5') {
                    $users = DB::table('battery')->where('battery_hotel', 'Tsix5')->get();
                }else if ($hotel == 'way') {
                    $users = DB::table('battery')->where('battery_hotel', 'way')->get();
                }else if ($hotel == 'z2') {
                    $users = DB::table('battery')->where('battery_hotel', 'Z-Through')->get();
                }else if ($hotel == 'garden') {
                    $users = DB::table('battery')->where('battery_hotel', 'Garden Seaview')->get();
                }else {
                    $users = DB::table('battery')->get();
                }
                break;
        }
        // Return
        return Datatables::of($users)
        ->addColumn('action', function ($users) {
            $btn_change = "<button type='button' battery_id='$users->battery_id' class='btn btn-sm btn-warning' onclick='Open_change_battery(this)'><i class='fas fa-prescription-bottle-alt'></i> Change</button>";
            $btn_edit   = "<button type='button' battery_id='$users->battery_id' class='btn btn-sm btn-primary' onclick='Open_edit_battery(this)'><i class='fas fa-search'></i> View</button>";
            return $btn_change.' '.$btn_edit;
        })
        ->addColumn('status', function ($users) {
            if ($users->battery_end < Carbon::now()) {
                $result = "<i class='fas fa-battery-empty'></i> หมดอายุ";
            }else{
                $result = "<i class='fas fa-battery-full'></i> ยังไม่หมดอายุ";
            }
            return $result;
        })
        ->setRowClass(function ($users) {
            if ($users->battery_end < Carbon::now()) {
                $result = "bg-danger";
            }else {
                $result = "bg-success";
            }
            return $result;
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }

    public function Add_ItemBattery(Request $request)
    {
        $check = Battery::where('battery_sticker_number', Str::upper($request->sticker_number_add))->count();
        $start_add = date('Y-m-d',strtotime(str_replace('/', '-', $request->start_add)));
        $end_add = date("Y-m-d", strtotime("+2 years", strtotime($start_add)));
        if ($check == 1) {
            echo json_encode(array('ststus' => '404', 'msg' => 'มีข้อมูลอยู่ในระบบแล้ว'));
        }else {
            $Battery = new Battery;
            $Battery->battery_sticker_number = Str::upper($request->sticker_number_add);
            $Battery->battery_type = $request->type_add;
            $Battery->battery_location = $request->location_add;
            $Battery->battery_hotel = $request->hotel_add;
            $Battery->battery_start = $start_add;
            $Battery->battery_end = $end_add;
            $Battery->save();
            return json_encode(array('ststus' => '200', 'msg' => 'OK'));
        }
    }

    public function Get_BatteryId(Request $request)
    {
        $Battery_detail = Battery::where('battery_id', $request->battery_id)->first();
        return json_encode(array('ststus' => '200', 'data' => $Battery_detail));
    }

    public function Update_Battery(Request $request)
    {
        $oldData = Battery::where('battery_sticker_number', $request->sticker_number_edit)->get();
        foreach ($oldData as $key => $old_row) {
            // type
            if($old_row->battery_type != $request->type_edit) {
                $Battery = Battery::find($old_row->battery_id);
                $Battery->battery_type = $request->type_edit;
                $Battery->save();
                $this->Change_Historys_Log($old_row->battery_sticker_number, 'Type', $old_row->battery_type, $request->type_edit);
            }
            // location
            if($old_row->battery_location != $request->location_edit) {
                $Battery = Battery::find($old_row->battery_id);
                $Battery->battery_location = $request->location_edit;
                $Battery->save();
                $this->Change_Historys_Log($old_row->battery_sticker_number, 'Location', $old_row->battery_location, $request->location_edit);
            }
            // hotel
            if($old_row->battery_hotel != $request->hotel_edit) {
                $Battery = Battery::find($old_row->battery_id);
                $Battery->battery_hotel = $request->hotel_edit;
                $Battery->save();
                $this->Change_Historys_Log($old_row->battery_sticker_number, 'Hotel', $old_row->battery_hotel, $request->hotel_edit);
            }
        }

        return json_encode(array('ststus' => '200', 'msg' => 'OK'));
    }

    public function Save_change_battery(Request $request)
    {
        $oldData = Battery::where('battery_id', $request->battery_id)->get();
        $start_add = date('Y-m-d',strtotime(str_replace('/', '-', $request->date_start_change)));
        $end_add = date("Y-m-d", strtotime("+2 years", strtotime($start_add)));
        foreach ($oldData as $key => $old_row) {
            $old_data_date = json_encode(array('start_date' => $old_row->battery_start, 'end_date' => $old_row->battery_end));
            $new_data_date = json_encode(array('start_date' => $start_add, 'end_date' => $end_add));
            $Battery = Battery::find($old_row->battery_id);
            $Battery->battery_start = $start_add;
            $Battery->battery_end = $end_add;
            $Battery->save();
            $this->Change_Historys_Log($old_row->battery_sticker_number, 'Battery', $old_data_date, $new_data_date);
        }

        return json_encode(array('ststus' => '200', 'msg' => 'OK'));
    }

    public function Change_Historys_Log($ID_Computer, $Item_type, $old_item, $Value_add)
    {
        if ($old_item == '' OR $old_item == null) {
            $Item_ststus = "เพิ่มข้อมูลใหม่";
        }else {
            $Item_ststus = "เปลี่ยนข้อมูล";
        }
        // Insert ChangeHistory
        $ChangeHistory = new ChangeHistory;
        // Insert Sticker Number
        $ChangeHistory->sticker_number = $ID_Computer;
        // Insert Item Type
        $ChangeHistory->item_type = $Item_type;
        // Insert Item Old
        $ChangeHistory->item_old = $old_item;
        // Insert Item Change
        $ChangeHistory->item_change = $Value_add;
        // Insert Item Status
        $ChangeHistory->item_status = $Item_ststus;
        // Insert User Change 
        $ChangeHistory->users_change = Auth::user()->username;
        // Insert Save
        $ChangeHistory->save();
        return;
    }

}
