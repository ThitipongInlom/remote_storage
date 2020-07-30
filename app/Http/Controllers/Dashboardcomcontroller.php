<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Item as Item;
use App\Model\User as User;
use App\Model\Department as Department;
use App\Model\Hotel as Hotel;
use App\Model\Window as Window;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Str;

class Dashboardcomcontroller extends Controller
{
    public function View_Dashboardcom(Request $request)
    {
        return view('page/dashboardcom', [
            'Department' => Department::get(),
            'Hotel' => Hotel::get(),
            'Window' => Window::get()
        ]);
    }

    public function Add_ItemCom(Request $request)
    {
        $check = Item::where('sticker_number', Str::upper($request->post('sticker_number_add')))->count();
        // เช็คว่ามีข้อมูลอยู่ในระบบ หรือไม่
        if ($check == 1) {
            echo json_encode(array('ststus' => '404', 'msg' => 'มีข้อมูลอยู่ในระบบแล้ว'));
        }else {
            $Item = new Item;
            $Item->sticker_number = Str::upper($request->post('sticker_number_add'));
            $Item->dep = $request->post('guest_dep_add');
            $Item->hotel = $request->post('guest_hotel_add');
            $Item->name = $request->post('guest_name_add');
            $Item->phone = $request->post('guest_phone_add');
            $Item->cpu = $request->post('cpu_add');
            $Item->ram = $request->post('ram_add');
            $Item->case = $request->post('case_add');
            $Item->monitor = $request->post('monitor_add');
            $Item->mouse = $request->post('mouse_add');
            $Item->keyboard = $request->post('keyboard_add');
            $Item->mainboard = $request->post('mainboard_add');
            $Item->powersupply = $request->post('powersupply_add');
            $Item->hdd = $request->post('hdd_add');
            $Item->ssd = $request->post('ssd_add');
            $Item->windows = $request->post('windows_add');
            $Item->teamviewer = $request->post('teamviwer_add');
            $Item->anydesk = $request->post('anydesk_add');
            $Item->computer_name = $request->post('computer_name_add');
            $Item->ip_main = $request->post('ip_main_add');
            $Item->ip_sub = $request->post('ip_sub_add');
            $Item->internet = $request->post('internet_add');
            $Item->license = $request->post('windows_license_add');
            $Item->username_admin = $request->post('username_admin_add');
            $Item->password_admin = $request->post('password_admin_add');
            $Item->ststus_com = 'Y';
            $Item->save();
            return json_encode(array('ststus' => '200', 'msg' => 'OK'));
        }
    }

    public function Get_ComId(Request $request)
    {
        $COM_detail = Item::where('item_id', $request->post('com_id'))->first();
        return json_encode(array('ststus' => '200', 'data' => $COM_detail));
    }
}
