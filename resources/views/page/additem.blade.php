<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Remote Storage</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- All Css -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse">
    @include('../layout.head')
    <!-- ส่วนหัวข้อมูล -->
    <div class="content-wrapper">
    <!-- END -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">เพิ่มข้อมูล <a href="{{ url('dashboard') }}" class="btn btn-sm btn-primary" role="button" data-toggle="tooltip" data-placement="bottom" title="ข้อมูลคอมพิวเตอร์ทั้งหมด"><i class="fas fa-tachometer-alt"></i> แดชบอร์ด</a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">ข้อมูล</li>
                <li class="breadcrumb-item">เพิ่มข้อมูล</li>
                </ol>
            </div>
            </div>
        </div>
    </div>

    <!-- ส่วนกลางที่แสดง -->
    <div class="content">
    <div class="container-fluid">  
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                <div class="card-header">
                    <b>ข้อมูลเบื้องต้น</b>
                </div>
                <div class="overflow-auto" style="height: 430px;">
                <div data-simplebar data-simplebar-auto-hide="false">
                <div class="card-body">
                    <h4>System</h4>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="sticker_number">Sticker Number</label>
                                        <input type="text" class="form-control form-control-sm" id="sticker_number" placeholder="Sticker Number">
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="computer_name">Computer Name</label>
                                        <input type="text" class="form-control form-control-sm" id="computer_name" placeholder="Computer Name">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="ip_main">IP Main <img src="{{ url('img/icon/ip.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="ip_main" placeholder="IP Main">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="ip_sub">IP Sub <img src="{{ url('img/icon/ip.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="ip_sub" placeholder="IP Sub">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="windows">Windows <img src="{{ url('img/icon/windows.png') }}" style="width: 18px;"></label>
                                        <select class="custom-select custom-select-sm" id="windows">
                                        @foreach ($Window as $row)
                                            <option value="{{ $row->window_titel }}">{{ $row->window_titel }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="internet">Internet <img src="{{ url('img/icon/internet.png') }}" style="width: 18px;"></label>
                                        <br>
                                        <div align="center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="internet_1" name="internet" class="custom-control-input" value="Enable" checked>
                                        <label class="custom-control-label" for="internet_1">เปิด</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="internet_2" name="internet" class="custom-control-input" value="Disable">
                                        <label class="custom-control-label" for="internet_2">ปิด</label>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4>Hardware</h4>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">CPU <img src="{{ url('img/icon/cpu.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="cpu" placeholder="CPU">
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_dep">RAM <img src="{{ url('img/icon/ram.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="ram" placeholder="RAM">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">Case <img src="{{ url('img/icon/case.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="case" placeholder="Case">
                                    </div>                             
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">Monitor <img src="{{ url('img/icon/monitor.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="monitor" placeholder="Monitor">
                                    </div>            
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">Mouse <img src="{{ url('img/icon/mouse.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="mouse" placeholder="Mouse">
                                    </div>                             
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">Keyboard <img src="{{ url('img/icon/keyboard.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="keyboard" placeholder="Keyboard">
                                    </div>            
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">Mainboard <img src="{{ url('img/icon/mainboard.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="mainboard" placeholder="Mainboard">
                                    </div>                             
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">Power Supply <img src="{{ url('img/icon/powersupply.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="powersupply" placeholder="Power Supply">
                                    </div>            
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">HDD <img src="{{ url('img/icon/hdd.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="hdd" placeholder="HDD">
                                    </div>                             
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">SSD <img src="{{ url('img/icon/ssd.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="ssd" placeholder="SSD">
                                    </div>            
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_name">UPS <img src="{{ url('img/icon/ups.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="ups" placeholder="UPS">
                                    </div>                             
                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                <div class="card-header">
                    <b>ข้อมูลของผู้ใช้งาน</b>
                </div>
                <div class="overflow-auto" style="height: 430px;">
                <div data-simplebar data-simplebar-auto-hide="false">
                <div class="card-body">
                    <h4>Guest</h4>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Guest Name <img src="{{ url('img/icon/user_name.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="guest_name" placeholder="Guest Name">
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_dep">Guest Dep <img src="{{ url('img/icon/dep.png') }}" style="width: 18px;"></label>
                                        <select class="custom-select custom-select-sm" id="guest_dep">
                                        @foreach ($Department as $row)
                                            <option value="{{ $row->department_titel }}">{{ $row->department_titel }} - {{ $row->department_main }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_phone">Guest Phone <img src="{{ url('img/icon/phone.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="guest_phone" placeholder="Guest Phone">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="guest_hotel">Guest Hotel <img src="{{ url('img/icon/hotel.png') }}" style="width: 18px;"></label>
                                        <select class="custom-select custom-select-sm" id="guest_hotel">                                    
                                        @foreach ($Hotel as $row)
                                            <option value="{{ $row->hotel_titel }}">{{ $row->hotel_titel }}</option>
                                        @endforeach
                                        </select>
                                    </div>                                
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4>Software</h4>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Teamviewer <img src="{{ url('img/teamviewer.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="teamviwer" placeholder="Teamviwer">
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_dep">Anydesk <img src="{{ url('img/anydesk.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="anydesk" placeholder="Anydesk">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Username Admin <img src="{{ url('img/icon/computer_name.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="username_admin" placeholder="Username_Admin">
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_dep">Password Admin <img src="{{ url('img/icon/computer_name.png') }}" style="width: 18px;"></label>
                                        <input type="text" class="form-control form-control-sm" id="password_admin" placeholder="Password_Admin">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div align="center" class="col-md-12">
                <button class="btn btn-sm btn-success btn-loading" onclick="Save_Add_Item();">บันทึก</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- END -->
    @include('../layout.footer')
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/additem.js') }}"></script>
</html>