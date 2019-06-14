<?php

namespace App\Http\Controllers;

use Response;
use App\Model\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class Registercontroller  extends Controller
{
    public function register_save(Request $request)
    {
        $username = User::where('username', $request->post('username'))->count();
        if ($username == '0') {
                // Insert User
                $User = new User;
                // Insert username
                $User->username = $request->post('username');
                // Insert Password
                $User->password = Hash::make($request->post('password'));
                // Insert Email
                $User->email = $request->post('email');
                // Insert remember_token
                $User->remember_token = $request->header('X-CSRF-TOKEN');
                // ยืนยันการ Insert ลง DB
                $User->save();

            return Response::json(array('status' => 'success','error_text' => 'สมัครสมาชิก สำเร็จ รอ 5 วินาที','path' => $request->root()),200);
        }else {
            return Response::json(array('status' => 'error','error_text' => 'ชื่อ มีอยู่ในระบบแล้ว กรุณาเปลี่ยน ชื่อผู้ใช้งาน'),200);    
        }
    }
}
