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
    <body class="hold-transition login-page">
    @include('../layout.head')
    <!-- ส่วนหัวข้อมูล -->
    <div class="content-wrapper">
    <!-- END -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">เพิ่มข้อมูล</h1>
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
                                        <label for="computer_name">Computer Name :</label>
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
                                        <input type="text" class="form-control form-control-sm" id="windows" placeholder="Windows">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="internet">Internet <img src="{{ url('img/icon/internet.png') }}" style="width: 18px;"></label>
                                        <br>
                                        <div align="center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="internet_1" name="internet" class="custom-control-input" value="Enable">
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
                                <td>
                                    <div class="form-group">
                                        <label for="sticker_number">Guest Name :</label>
                                        <input type="text" class="form-control form-control-sm" id="sticker_number" placeholder="Guest Name">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="computer_name">Guest Dep :</label>
                                        <input type="text" class="form-control form-control-sm" id="computer_name" placeholder="Guest Dep">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="ip_main">Guest Phone :</label>
                                        <input type="text" class="form-control form-control-sm" id="ip_main" placeholder="Guest Phone">
                                    </div>
                                </td>
                                <td>
                                
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
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