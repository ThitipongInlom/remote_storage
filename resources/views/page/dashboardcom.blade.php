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
    <body class="hold-transition sidebar-mini sidebar-open">
    @include('../layout.head')
    <!-- ส่วนหัวข้อมูล -->
    <div class="content-wrapper">
        <!-- END -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ข้อมูล เครื่องคอมพิวเตอร์</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">ข้อมูล</li>
                    <li class="breadcrumb-item">แดชบอร์ด</li>
                    </ol>
                </div>
                </div>
            </div>
        </div>

        <!-- ส่วนกลางที่แสดง -->
        <div class="content">
            <div class="container-fluid">
            <!-- จำนวนข้อมูลทั้งหมด -->    
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left mb-3">
                                <h4>
                                    <button type="button" class="btn btn-sm btn-secondary bg-orange" 
                                            data-toggle="tooltip" data-placement="bottom" title="ข้อมูล COM ล่าสุดที่มีในระบบ">
                                        <b>TheZign</b> <span class="badge badge-light btn_list_thezign"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary bg-red"
                                            data-toggle="tooltip" data-placement="bottom" title="ข้อมูล COM ล่าสุดที่มีในระบบ">
                                        <b>Tsix5</b> <span class="badge badge-light btn_list_tsix5"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary bg-purple"
                                            data-toggle="tooltip" data-placement="bottom" title="ข้อมูล COM ล่าสุดที่มีในระบบ">
                                        <b>Way</b> <span class="badge badge-light btn_list_way"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary bg-cyan"
                                            data-toggle="tooltip" data-placement="bottom" title="ข้อมูล COM ล่าสุดที่มีในระบบ">
                                        <b>Z2</b> <span class="badge badge-light btn_list_z2"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary bg-yellow"
                                            data-toggle="tooltip" data-placement="bottom" title="ข้อมูล COM ล่าสุดที่มีในระบบ">
                                        <b>Garden</b> <span class="badge badge-light btn_list_garden"></span>
                                    </button>
                                </h4>
                            </div>
                            <div class="float-right text-right mb-3">
                                <select class="custom-select custom-select-sm col-4" id="hotel_select_table" onchange="load_table_on_select();">
                                    <option value="all">โรงแรมทั้งหมด</option>
                                    <option value="thezign">TheZign</option>
                                    <option value="tsix5">Tsix5</option>
                                    <option value="way">Way</option>
                                    <option value="z2">Z2</option>
                                    <option value="garden">Garden</option>
                                </select>
                                <select class="custom-select custom-select-sm col-4" id="type_select_table" onchange="load_table_on_select();">
                                    <option value="return_all">ข้อมูลคอมพิวเตอร์ทั้งหมด</option>
                                    <option value="return_yes">ข้อมูลคอมพิวเตอร์ที่ ใช้งาน</option>
                                    <option value="return_no">ข้อมูลคอมพิวเตอร์ที่ ไม่ได้ใช้งาน</option>
                                    <option value="return_wait">ข้อมูลคอมพิวเตอร์ที่ ส่งซ่อม</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="เพิ่มข้อมูลคอมพิวเตอร์" onclick="Open_add_computer()"><i class="fas fa-plus"></i> เพิ่มข้อมูล</button>
                            </div>
                        </div>
                    <div class="table-responsive">
                    <table class="table table-sm dt-responsive nowrap row-border table-bordered table-hover dt-responsive display nowrap" cellspacing="0" cellpadding="0" id="Table_Main" width="100%">
                        <thead>
                            <tr class="bg-primary">
                                <th width="5%">Status</th>
                                <th width="5%">Sticker</th>
                                <th width="20%">Name</th>
                                <th width="5%">Dep</th>
                                <th width="40%">Computer Name</th>
                                <th width="10%">IP</th>
                                <th width="10%">Teamviewer</th>
                                <th width="10%">Anydesk</th>
                                <th width="10%">Phone</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modal_add_computer" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal_add_computerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal_add_computerLabel"><i class="fas fa-plus"></i> เพิ่มข้อมูล เครื่องคอมพิวเตอร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-add-com-tab" data-toggle="pill" href="#custom-tabs-add-com" role="tab" aria-controls="custom-tabs-add-com" aria-selected="true">ข้อมูลเครื่องคอมพิวเตอร์</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-add-com" role="tabpanel" aria-labelledby="custom-tabs-add-com-tab">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="add-com-guest-tab" data-toggle="pill" href="#add-com-guest" role="tab" aria-controls="add-com-guest" aria-selected="true"><i class="fas fa-id-card-alt"></i> Guest</a>
                                            <a class="nav-link" id="add-com-system-tab" data-toggle="pill" href="#add-com-system" role="tab" aria-controls="add-com-system" aria-selected="false"><i class="fas fa-server"></i>  System</a>
                                            <a class="nav-link" id="add-com-software-tab" data-toggle="pill" href="#add-com-software" role="tab" aria-controls="add-com-software" aria-selected="false"><i class="fas fa-server"></i> Software</a>
                                            <a class="nav-link" id="add-com-hardware-tab" data-toggle="pill" href="#add-com-hardware" role="tab" aria-controls="add-com-hardware" aria-selected="false"><i class="fas fa-server"></i> Hardware</a>
                                        </div>
                                    </div>
                                    <div class="col-7 col-sm-9">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <div class="tab-pane text-left fade active show" id="add-com-guest" role="tabpanel" aria-labelledby="add-com-guest-tab">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_name">Guest Name <img src="{{ url('img/icon/user_name.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="guest_name_add" placeholder="Guest Name">
                                                                </div>
                                                            </td>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_dep">Guest Dep <img src="{{ url('img/icon/dep.png') }}" style="width: 18px;"></label>
                                                                    <select class="custom-select custom-select-sm" id="guest_dep_add">
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
                                                                    <input type="text" class="form-control form-control-sm" id="guest_phone_add" placeholder="Guest Phone">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_hotel">Guest Hotel <img src="{{ url('img/icon/hotel.png') }}" style="width: 18px;"></label>
                                                                    <select class="custom-select custom-select-sm" id="guest_hotel_add">                                    
                                                                    @foreach ($Hotel as $row)
                                                                        <option value="{{ $row->hotel_titel }}">{{ $row->hotel_titel }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>                                
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="add-com-system" role="tabpanel" aria-labelledby="add-com-system-tab">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="sticker_number">Sticker Number</label>
                                                                    <input type="text" class="form-control form-control-sm" id="sticker_number_add" placeholder="Sticker Number">
                                                                </div>
                                                            </td>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="computer_name">Computer Name</label>
                                                                    <input type="text" class="form-control form-control-sm" id="computer_name_add" placeholder="Computer Name">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="ip_main">IP Main <img src="{{ url('img/icon/ip.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="ip_main_add" placeholder="IP Main">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="ip_sub">IP Sub <img src="{{ url('img/icon/ip.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="ip_sub_add" placeholder="IP Sub">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="windows">Windows <img src="{{ url('img/icon/windows.png') }}" style="width: 18px;"></label>
                                                                    <select class="custom-select custom-select-sm" id="windows_add">
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
                                                                            <input type="radio" id="internet_add_1" name="internet_add" class="custom-control-input" value="Enable" checked>
                                                                            <label class="custom-control-label" for="internet_1">เปิด</label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <input type="radio" id="internet_add_2" name="internet_add" class="custom-control-input" value="Disable">
                                                                            <label class="custom-control-label" for="internet_2">ปิด</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="windows_license">Windows license <img src="{{ url('img/icon/license.png') }}" style="width: 18px;"></label>
                                                                <br>
                                                                <div align="center">
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="windows_license_add_1" name="windows_license_add" class="custom-control-input" value="Active">
                                                                        <label class="custom-control-label" for="windows_license_1">แท้</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="windows_license_add_2" name="windows_license_add" class="custom-control-input" value="Not Active">
                                                                        <label class="custom-control-label" for="windows_license_2">ไม่แท้</label>
                                                                    </div>
                                                                </div>                                                          
                                                            </td>
                                                            <td>
                                                            
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="add-com-software" role="tabpanel" aria-labelledby="add-com-software-tab">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_name">Teamviewer <img src="{{ url('img/teamviewer.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="teamviwer_add" placeholder="Teamviwer">
                                                                </div>
                                                            </td>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_dep">Anydesk <img src="{{ url('img/anydesk.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="anydesk_add" placeholder="Anydesk">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_name">Username Admin <img src="{{ url('img/icon/computer_name.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="username_admin_add" placeholder="Username_Admin">
                                                                </div>
                                                            </td>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_dep">Password Admin <img src="{{ url('img/icon/computer_name.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="password_admin_add" placeholder="Password_Admin">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody> 
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="add-com-hardware" role="tabpanel" aria-labelledby="add-com-hardware-tab">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_name">CPU <img src="{{ url('img/icon/cpu.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="cpu_add" placeholder="CPU">
                                                                </div>
                                                            </td>
                                                            <td width="50%">
                                                                <div class="form-group">
                                                                    <label for="guest_dep">RAM <img src="{{ url('img/icon/ram.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="ram_add" placeholder="RAM">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">Case <img src="{{ url('img/icon/case.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="case_add" placeholder="Case">
                                                                </div>                             
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">Monitor <img src="{{ url('img/icon/monitor.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="monitor_add" placeholder="Monitor">
                                                                </div>            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">Mouse <img src="{{ url('img/icon/mouse.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="mouse_add" placeholder="Mouse">
                                                                </div>                             
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">Keyboard <img src="{{ url('img/icon/keyboard.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="keyboard_add" placeholder="Keyboard">
                                                                </div>            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">Mainboard <img src="{{ url('img/icon/mainboard.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="mainboard_add" placeholder="Mainboard">
                                                                </div>                             
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">Power Supply <img src="{{ url('img/icon/powersupply.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="powersupply_add" placeholder="Power Supply">
                                                                </div>            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">HDD <img src="{{ url('img/icon/hdd.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="hdd_add" placeholder="HDD">
                                                                </div>                             
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="guest_name">SSD <img src="{{ url('img/icon/ssd.png') }}" style="width: 18px;"></label>
                                                                    <input type="text" class="form-control form-control-sm" id="ssd_add" placeholder="SSD">
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
                    </div>
                </div>
            </div>
            <div class="modal-footer d-inline">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-sm btn-block btn-danger" data-dismiss="modal">ยกเลิก</button>                    
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-sm btn-block btn-success">ยืนยัน</button> 
                    </div>
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
    <script type="text/javascript" src="{{ url('js/add_item_com.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/dashboardcom.js') }}"></script>
</html>