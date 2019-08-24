<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Model\User as User;
use App\Model\Department as Department;
use App\Model\Hotel as Hotel;
use App\Model\Window as Window;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Addselectitemcontroller extends Controller
{
    public function Add_select_item()
    {
        return view('page/addselectitem', [
                    'Department' => Department::get(),
                    'Hotel' => Hotel::get(),
                    'Window' => Window::get()]);
    }

    public function save_add_item_windows(Request $request)
    {
        // เช็คว่าที่จะเพิ่มใหม่ มีใน ระบบแล้วยัง
        $Window = Window::where('window_titel', $request->post('Modal_add_item_windows'))->count();
        if ($Window == '0') {
            $Window = new Window;
            $Window->window_titel = $request->post('Modal_add_item_windows');
            $Window->save();
            // Error Save สำเร็จ
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Window '.$request->post('Modal_add_item_windows').' ซ้ำมีในระบบแล้ว'),200);
        }
    }

    public function save_add_item_department(Request $request)
    {
        // เช็คว่าที่จะเพิ่มใหม่ มีใน ระบบแล้วยัง
        $Department = Department::where('department_titel', $request->post('Modal_add_item_department'))->count();
        if ($Department == '0') {
            $Department = new Department;
            $Department->department_titel = strtoupper($request->post('Modal_add_item_department'));
            $Department->department_main  = $request->post('Modal_add_item_department2');
            $Department->save();
            // Error Save สำเร็จ
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Department '.$request->post('Modal_add_item_department').' ซ้ำมีในระบบแล้ว'),200);
        }
    }

    public function save_add_item_hotel(Request $request)
    {
        // เช็คว่าที่จะเพิ่มใหม่ มีใน ระบบแล้วยัง
        $Hotel = Hotel::where('hotel_titel', $request->post('Modal_add_item_hotel'))->count();
        if ($Hotel == '0') {
            $Hotel = new Hotel;
            $Hotel->hotel_titel = $request->post('Modal_add_item_hotel');
            $Hotel->save();
            // Error Save สำเร็จ
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Hotel '.$request->post('Modal_add_item_hotel').' ซ้ำมีในระบบแล้ว'),200);
        }
    }

    public function save_edit_item_windows(Request $request)
    {
        // เช็คว่าที่จะเพิ่มใหม่ มีใน ระบบแล้วยัง
        $Window = Window::where('window_titel', $request->post('old_value'))->count();
        if ($Window == '0') {
            $Window = Window::find($request->post('old_id'));
            $Window->window_titel = $request->post('old_value');
            $Window->save();
            // Error Save สำเร็จ
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Window '.$request->post('old_value').' ซ้ำมีในระบบแล้ว'),200);
        }
    }

    public function save_edit_item_department(Request $request)
    {
        // เช็คว่าที่จะเพิ่มใหม่ มีใน ระบบแล้วยัง
        $Department = Department::where('department_titel', $request->post('old_value'))->where('department_main', $request->post('old_value2'))->count();
        if ($Department == '0') {
            $Department = Department::find($request->post('old_id'));
            $Department->department_titel = $request->post('old_value');
            $Department->department_main  = $request->post('old_value2');
            $Department->save();
            // Error Save สำเร็จ
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Department '.$request->post('old_value').' ซ้ำมีในระบบแล้ว'),200);
        }
    }

    public function save_edit_item_hotel(Request $request)
    {
        // เช็คว่าที่จะเพิ่มใหม่ มีใน ระบบแล้วยัง
        $Hotel = Hotel::where('hotel_titel', $request->post('old_value'))->count();
        if ($Hotel == '0') {
            $Hotel = Hotel::find($request->post('old_id'));
            $Hotel->hotel_titel = $request->post('old_value');
            $Hotel->save();
            // Error Save สำเร็จ
            return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'),200);
        }else{
            // Error Save ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'Hotel '.$request->post('old_value').' ซ้ำมีในระบบแล้ว'),200);
        }  
    }

    public function save_delete_item(Request $request)
    {
        switch ($request->post('type')) {
            case 'windows':
                $Window = Window::find($request->post('old_id'));
                $Window->delete();
                // Error Save สำเร็จ
                return Response::json(array('status' => 'success','error_text' => 'ลบ เสร็จสิ้น รอ 1วินาที'),200);
                break;
            case 'department':
                $Department = Department::find($request->post('old_id'));
                $Department->delete();
                // Error Save สำเร็จ
                return Response::json(array('status' => 'success','error_text' => 'ลบ เสร็จสิ้น รอ 1วินาที'),200);
                break;
            case 'hotel':
                $Hotel = Hotel::find($request->post('old_id'));
                $Hotel->delete();
                // Error Save สำเร็จ
                return Response::json(array('status' => 'success','error_text' => 'ลบ เสร็จสิ้น รอ 1วินาที'),200);
                break;           
        }
    }
}
