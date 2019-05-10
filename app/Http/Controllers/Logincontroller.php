<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Model\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as DB;

class Logincontroller extends Controller
{
    public function do_login(Request $request)
    {   
        // เช็คว่า มี Username ถูกต้องหรือไม่
        if (Auth::attempt(['username' => $request->post('username'), 'password' => $request->post('password')])) {
            // อัพเดต ข้อมูลเวลา Login เสร็จสิ้น
            $user = User::find(Auth::user()->users_id);
            $user->updated_at = Carbon::now();
            $user->remember_token = $request->header('X-CSRF-TOKEN');
            $user->save();

            // Success Login สำเร็จ
            return Response::json(array('status' => 'success','error_text' => 'เข้าสู่ระบบสำเร็จ รอ 3 วินาที','path' => $request->root()),200);
        }else{
            // Error Login ไม่สำเร็จ
            return Response::json(array('status' => 'error','error_text' => 'ชื่อผู้ใช้งาน และ รหัสผ่าน ไม่ถูกต้อง'),200);
        }
    }

}
