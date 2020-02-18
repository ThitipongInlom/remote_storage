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
                <h1 class="m-0 text-dark">แดชบอร์ด WIFI</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">ข้อมูล</li>
                <li class="breadcrumb-item">ข้อมูล WIFI</li>
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
                    <div class="float-left text-right mb-3">
                        <button class="btn btn-sm btn-success" onclick="Btn_generate_wifi_group()"><i class="fas fa-paper-plane"></i> ทดลอง ยิง API</button>
                    </div>
                    <div class="float-right text-right mb-3">
                        <select class="custom-select custom-select-sm col-7" id="select_type" onchange="load_table_on_select();">
                            <option value="wifi_all">ข้อมูล Wifi ทั้งหมด</option>
                            <option value="wifi_wait">ข้อมูล Wifi รอสร้าง</option>
                            <option value="wifi_complete">ข้อมูล Wifi สร้างแล้ว</option>
                        </select>
                        <button class="btn btn-sm btn-success" onclick="Open_add_data_modal();" data-toggle="tooltip" data-placement="bottom" title="เพิ่มข้อมูล WIFI"><i class="fas fa-plus"></i> เพิ่มข้อมูล</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm dt-responsive nowrap row-border table-bordered table-hover dt-responsive display nowrap" cellspacing="0" cellpadding="0" id="Table_Main" width="100%">
                        <thead>
                            <tr class="bg-primary">
                                <th>Group</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- END -->
    @include('../layout.footer')

    <!-- Modal Add Data -->
    <div class="modal fade" id="Add_data_modal" tabindex="-1" role="dialog" aria-labelledby="Add_data_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary mb-2 pb-2">
                    <h4 class="modal-title">เพิ่ม รายการ สร้าง WIFI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="group_name">ชื่อ Group :</label>
                                <input type="text" class="form-control form-control-sm" id="group_name" placeholder="Group">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datepicker_data_wifi">เลือกวันที่ :</label>
                                <input type="text" class="form-control form-control-sm" id="datepicker_data_wifi" placeholder="เลือกวันที่">
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user">Username :</label>
                                <input type="text" class="form-control form-control-sm" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="text" class="form-control form-control-sm" id="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select_hotel">Hotel :</label>
                                <select class="custom-select custom-select-sm" id="select_hotel" onchange="load_table_on_select();">
                                    <option value="thezign">TheZign</option>
                                    <option value="tsix5">Tsix5</option>
                                    <option value="way">Way</option>
                                    <option value="z2">Z-Through</option>
                                    <option value="garden_seaview">Garden Seaview</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="display:inline">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-block btn-danger" data-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-block btn-success" onclick="Save_add_data_modal();">ยืนยันการสร้าง WIFI</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/dashboardwifi.js') }}"></script>
</html>