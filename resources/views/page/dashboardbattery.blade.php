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
    <body class="hold-transition sidebar-mini sidebar-closed sidebar-collapse">
    @include('../layout.head')
    <!-- ส่วนหัวข้อมูล -->
    <div class="content-wrapper">
    <!-- END -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ข้อมูล แบตเตอร์รี่</h1>
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
                        <!-- ข้อมูล ซ้ายมือ -->
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
                            <option value="return_all">ข้อมูลเครื่องสำรองไฟทั้งหมด</option>
                            <option value="return_no">เครื่องสำรองไฟ ยังไม่หมดอายุ</option>
                            <option value="return_yes">เครื่องสำรองไฟ หมดอายุ</option>
                        </select>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="เพิ่มข้อมูลแบตเตอร์รี่" onclick="Open_add_battery()"><i class="fas fa-plus"></i> เพิ่มข้อมูล</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm dt-responsive nowrap row-border table-bordered table-hover dt-responsive display nowrap" cellspacing="0" cellpadding="0" id="Table_Main" width="100%">
                        <thead>
                            <tr class="bg-primary">
                                <th>Status</th>
                                <th>Sticker</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Action</th>
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
    <div class="modal fade" id="modal_add_battery" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal_add_batteryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title" id="modal_add_batteryLabel"><i class="fas fa-plus"></i> เพิ่มข้อมูลแบตเตอร์รี่</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Sticker Number</label>
                                        <input type="text" class="form-control form-control-sm" id="sticker_number_add" placeholder="Sticker Number">
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_hotel">Type</label>
                                        <select class="custom-select custom-select-sm" onchange="change_Type(this)" id="type_add">                                    
                                            <option value="COM">คอมพิวเตอร์</option>
                                            <option value="Switch">ตู้สวิตซ์</option>
                                            <option value="Server">เครื่องเชิฟเวอร์</option>
                                        </select>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Location</label>
                                        <input type="text" class="form-control form-control-sm" id="location_add" placeholder="Location" disabled>
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_hotel">Hotel</label>
                                        <select class="custom-select custom-select-sm" id="hotel_add">                                    
                                        @foreach ($Hotel as $row)
                                            <option value="{{ $row->hotel_titel }}">{{ $row->hotel_titel }}</option>
                                        @endforeach
                                        </select>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Battery Start</label>
                                        <input type="text" class="form-control form-control-sm" id="start_add" placeholder="Battery Start">
                                    </div>
                                </td>
                                <td width="50%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer d-inline">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-sm btn-block btn-danger" data-dismiss="modal">ยกเลิก</button>                    
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-sm btn-block btn-success" onclick="Save_Add_item()">ยืนยัน</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_edit_battery" tabindex="-1" role="dialog" aria-labelledby="modal_edit_batteryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="modal_edit_batteryLabel"><i class="fas fa-plus"></i> แก้ไขข้อมูลแบตเตอร์รี่</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Sticker Number</label>
                                        <input type="text" class="form-control form-control-sm" id="sticker_number_edit" placeholder="Sticker Number" disabled>
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_hotel">Type</label>
                                        <select class="custom-select custom-select-sm" onchange="change_Type_edit(this)" id="type_edit">                                    
                                            <option value="COM">คอมพิวเตอร์</option>
                                            <option value="Switch">ตู้สวิตซ์</option>
                                            <option value="Server">เครื่องเชิฟเวอร์</option>
                                        </select>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_name">Location</label>
                                        <input type="text" class="form-control form-control-sm" id="location_edit" placeholder="Location" disabled>
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="guest_hotel">Hotel</label>
                                        <select class="custom-select custom-select-sm" id="hotel_edit">                                    
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
                <div class="modal-footer d-inline">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-sm btn-block btn-danger" data-dismiss="modal">ยกเลิก</button>                    
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-sm btn-block btn-success" id="btn_save_edit_battery" onclick="Save_edit_battery(this)">ยืนยัน</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_change_battery" tabindex="-1" role="dialog" aria-labelledby="modal_change_batteryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="modal_change_batteryLabel"><i class="fas fa-plus"></i> แก้ไขข้อมูลแบตเตอร์รี่</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="guest_phone">Change Battery</label>
                                <input type="text" class="form-control form-control-sm" id="date_start_change" placeholder="Change Battery">
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
                            <button type="button" class="btn btn-sm btn-block btn-success" id="btn_save_change_battery" onclick="Save_change_battery(this)">ยืนยัน</button> 
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
    <script type="text/javascript" src="{{ url('js/dashboardbattery.js') }}"></script>
</html>