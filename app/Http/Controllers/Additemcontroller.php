<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Model\User as User;
use App\Model\System as System;
use App\Model\Software as Software;
use App\Model\Runcomputer as Runcomputer;
use App\Model\Hardware as Hardware;
use App\Model\Guest as Guest;
use App\Model\Department as Department;
use App\Model\Hotel as Hotel;
use App\Model\Window as Window;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Additemcontroller extends Controller
{
    public function Add_item()
    {
        return view('page/additem', [
                    'Department' => Department::get(),
                    'Hotel' => Hotel::get(),
                    'Window' => Window::get()]);
    }

    public function Additem_save(Request $request)
    {
        // เช็คว่า Sticker Number ซ้ำในระบบหรือไม่ แปลงค่าเป็น Upper
        $sticker_number_count = Runcomputer::where('sticker_number', strtoupper($request->post('sticker_number')))->count();
        if ($sticker_number_count == '0') {
            // 1.เพิ่มข้อมูลส่วน System
            $System = new System;
            $System->sticker_number = strtoupper($request->post('sticker_number'));
            $System->computer_name = $request->post('computer_name');
            $System->ip_main = $request->post('ip_main');
            $System->ip_sub = $request->post('ip_sub');
            $System->windows = $request->post('windows');
            $System->internet = $request->post('internet');
            $System->save();
            // 2.เพิ่มข้อมูลส่วน Software
            $Software = new Software;
            $Software->sticker_number = strtoupper($request->post('sticker_number'));
            $Software->teamviewer = $request->post('teamviewer');
            $Software->anydesk = $request->post('anydesk');
            $Software->save();
            // 3.เพิ่มข้อมูลส่วน Runcomputer
            $Runcomputer = new Runcomputer;
            $Runcomputer->sticker_number = strtoupper($request->post('sticker_number'));
            $Runcomputer->save();
            // 4.เพิ่มข้อมูลส่วน Hardware
            $Hardware = new Hardware;
            $Hardware->sticker_number = strtoupper($request->post('sticker_number'));
            $Hardware->save();
            // 5.เพิ่มข้อมูลส่วน Guest
            $Guest = new Guest;
            $Guest->sticker_number = strtoupper($request->post('sticker_number'));
            $Guest->guest_name = $request->post('guest_name');
            $Guest->guest_dep = $request->post('guest_dep');
            $Guest->guest_hotel = $request->post('guest_hotel');
            $Guest->guest_phone = $request->post('guest_phone');
            $Guest->save();
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Sticker '.strtoupper($request->post('sticker_number')).' ซ้ำมีในระบบแล้ว'),200);
        }
    }
    
}
