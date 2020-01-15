@if (Auth::check()) 
    <script>window.location = "{{ url('dashboard') }}";</script>
@endif
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>เข้าสู่ระบบ | Remote Storage</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- All Css -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    </head>
    <body class="hold-transition login-page" style="background-image:url('{{ url('img/bg_login.png') }}'); background-repeat: round;">
        <div class="login-box">
        <div class="login-logo">
           <p style="color: #f78d34e0;"><b>Remote</b> Storage</p>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">เข้าสู่ระบบ เพื่อค้นหาข้อมูลเครื่องคอม</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend" data-toggle="tooltip" data-placement="left" title="ชื่อผุ้ใช้งาน">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="username" placeholder="ชื่อผุ้ใช้งาน" aria-label="ชื่อผุ้ใช้งาน" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend" data-toggle="tooltip" data-placement="left" title="รผัสผ่าน">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" placeholder="รผัสผ่าน" aria-label="รผัสผ่าน" aria-describedby="basic-addon2">
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-sm btn-block btn-primary btn-loading" id="fun_login" data-toggle="tooltip" data-placement="bottom" title="เข้าสู่ระบบ"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                    </div>               
                </div>
            </div>
        </div>
        </div>
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/login.js') }}"></script>
</html>