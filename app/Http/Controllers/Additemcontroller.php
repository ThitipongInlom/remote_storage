<?php

namespace App\Http\Controllers;

use Response;
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
        $sticker_number_count = Item::where('sticker_number', strtoupper($request->post('sticker_number')))->count();
        if ($sticker_number_count == '0') {
            // 1.เพิ่มข้อมูลส่วน System
            $Item = new Item;
            $Item->sticker_number = strtoupper($request->post('sticker_number'));
            $Item->name = $request->post('guest_name');
            $Item->dep = $request->post('guest_dep');
            $Item->hotel = $request->post('guest_hotel');
            $Item->phone = $request->post('guest_phone');
            $Item->computer_name = $request->post('computer_name');
            $Item->ip_main = $request->post('ip_main');
            $Item->ip_sub = $request->post('ip_sub');
            $Item->windows = $request->post('windows');
            $Item->internet = $request->post('internet');
            $Item->teamviewer = $request->post('teamviwer');
            $Item->anydesk = $request->post('anydesk');
            $Item->cpu = $request->post('cpu');
            $Item->ram = $request->post('ram');
            $Item->case = $request->post('case');
            $Item->monitor = $request->post('monitor');
            $Item->mouse = $request->post('mouse');
            $Item->keyboard = $request->post('keyboard');
            $Item->mainboard = $request->post('mainboard');
            $Item->powersupply = $request->post('powersupply');
            $Item->hdd = $request->post('hdd');
            $Item->ssd = $request->post('ssd');
            $Item->ups = $request->post('ups');
            $Item->save();
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Sticker '.strtoupper($request->post('sticker_number')).' ซ้ำมีในระบบแล้ว'),200);
        }
    }
    
}
