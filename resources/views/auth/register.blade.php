<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>สมัครสมาชิก | Remote Storage</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- All Css -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    </head>
    <body class="hold-transition login-page" style="background-image:url('{{ url('img/bg_login.jpg') }}');">
        <div class="login-box">
        <div class="login-logo">
           <p style="color:#ff2066;"><b>Remote</b> Storage</p>
        </div>
        <div class="card" style="background-color: #000000a6;">
            <div class="card-body login-card-body">
            <p class="login-box-msg" style="color: #9af9ff;">สมัครสมาชิก เพื่อค้นหาข้อมูลเครื่องคอม</p>

                <div class="input-group mb-3">
                <input type="text" class="form-control" id="username" placeholder="ชื่อผู้ใช้งาน" aria-label="ชื่อผู้ใช้งาน" aria-describedby="basic-addon1">
                <div class="input-group-prepend" data-toggle="tooltip" data-placement="right" title="ชื่อผู้ใช้งาน">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                </div>
                <div class="valid-feedback">
                    ข้อมูล ชื่อผุ้ใช้งาน สมบูรณ์
                </div>
                <div class="invalid-feedback">
                    กรุณากรอก ชื่อผุ้ใช้งาน
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" placeholder="รผัสผ่าน" aria-label="รผัสผ่าน" aria-describedby="basic-addon2">
                <div class="input-group-prepend" data-toggle="tooltip" data-placement="right" title="รผัสผ่าน">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                </div>
                </div>
                <div class="valid-feedback">
                    ข้อมูล รผัสผ่าน สมบูรณ์
                </div>
                <div class="invalid-feedback">
                    กรุณากรอก รผัสผ่าน
                </div>
                <div class="input-group mb-3">
                <input type="text" class="form-control" id="email" placeholder="อีเมล์" aria-label="อีเมล์" aria-describedby="basic-addon4">
                <div class="input-group-prepend" data-toggle="tooltip" data-placement="right" title="อีเมล์">
                    <span class="input-group-text" id="basic-addon4"><i class="fas fa-envelope"></i></span>
                </div>
                </div>
                <div class="valid-feedback">
                    ข้อมูล อีเมล์ สมบูรณ์
                </div>
                <div class="invalid-feedback">
                    กรุณากรอก อีเมล์
                </div>
                <hr>
                <div class="row">
                <div class="col-4">
                    <a href="{{ url('/') }}" class="btn btn-sm btn-primary" role="button" aria-pressed="true" data-toggle="tooltip" data-placement="bottom" title="เข้าสู่ระบบ">เข้าสู่ระบบ</a>
                </div>
                <div class="col-4" align="center">
                    <button type="submit" class="btn btn-sm btn-success btn-loading" data-style="expand-right" id="fun_Save_register" data-toggle="tooltip" data-placement="bottom" title="ยืนยันสมัคร">ยืนยันสมัคร</button>
                </div>               
                </div>
            </div>
        </div>
        </div>

    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/register.js') }}"></script>
</html>
