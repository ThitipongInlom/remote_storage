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
                <h1 class="m-0 text-dark">เพิ่มข้อมูล แผนก / โรงแรม / ระบบ <a href="{{ url('dashboard') }}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-tachometer-alt"></i> แดชบอร์ด</a></h1>
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
            <div class="col-md-4">
                <div class="card card-primary">
                <div class="card-header">
                    <b>Windows</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-success" onclick="Open_modal_add_windows();">เพิ่ม Windows</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="overflow-auto" style="height: 450px;">
                        <div data-simplebar data-simplebar-auto-hide="false">
                        <table class="table table-hover table-sm m-0">
                            <thead>
                            <tr align="center">
                                <th width="60%">Windows Name</th>
                                <th width="40%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Window as $row)
                            <tr>
                                <td align="left"><b>{{ $row->window_titel }}</b></td>
                                <td align="right">
                                    <button class="btn btn-sm btn-warning" old_value="{{ $row->window_titel }}" onclick="Open_modal_edit_windows(this);">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger" type="windows" old_value="{{ $row->window_titel }}" old_id="{{ $row->window_id }}" onclick="Open_modal_delete(this);">ลบ</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                <div class="card-header">
                    <b>Department</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-success" onclick="Open_modal_add_department();">เพิ่ม Department</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="overflow-auto" style="height: 450px;">
                        <div data-simplebar data-simplebar-auto-hide="false">
                        <table class="table table-hover table-sm m-0">
                            <thead>
                            <tr align="center">
                            <th width="60%">Department Name</th>
                            <th width="40%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Department as $row)
                            <tr>
                                <td align="left"><b>{{ $row->department_titel }}</b></td>
                                <td align="right">
                                    <button class="btn btn-sm btn-warning" old_value="{{ $row->department_titel }}" onclick="Open_modal_edit_department(this);">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger" type="department" old_value="{{ $row->department_titel }}" old_id="{{ $row->department_id }}" onclick="Open_modal_delete(this);">ลบ</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                <div class="card-header">
                    <b>Hotel</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-success" onclick="Open_modal_add_hotel();">เพิ่ม Hotel</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="overflow-auto" style="height: 450px;">
                        <div data-simplebar data-simplebar-auto-hide="false">
                        <table class="table table-hover table-sm m-0">
                            <thead>
                            <tr align="center">
                            <th width="60%">Hotel Name</th>
                            <th width="40%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Hotel as $row)
                            <tr>
                                <td align="left"><b>{{ $row->hotel_titel }}</b></td>
                                <td align="right">
                                    <button class="btn btn-sm btn-warning" old_value="{{ $row->hotel_titel }}" onclick="Open_modal_edit_hotel(this);">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger" type="hotel" old_value="{{ $row->hotel_titel }}" old_id="{{ $row->hotel_id }}" onclick="Open_modal_delete(this);">ลบ</button>
                                </td>
                            </tr>
                            @endforeach
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
    </div>
    <!-- Modal Add Windows -->
    <div class="modal fade" id="Modal_add_windows" tabindex="-1" role="dialog" aria-labelledby="Modal_add_windowsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_add_windowsLabel">เพิ่มข้อมูล Windows</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <label for="Modal_add_item_windows">เพิ่มข้อมูล Windows</label>
                <input type="text" class="form-control form-control-sm" id="Modal_add_item_windows" placeholder="เพิ่มข้อมูล Windows">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-success btn-loading" onclick="Add_item_windows();">บันทึก Windows</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Add Department -->
    <div class="modal fade" id="Modal_add_department" tabindex="-1" role="dialog" aria-labelledby="Modal_add_departmentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_add_departmentLabel">เพิ่มข้อมูล Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <label for="Modal_add_item_department">เพิ่มข้อมูล Department</label>
                <input type="text" class="form-control form-control-sm" id="Modal_add_item_department" placeholder="เพิ่มข้อมูล Department">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-success btn-loading" onclick="Add_item_department();">บันทึก Department</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Add Hotel -->
    <div class="modal fade" id="Modal_add_hotel" tabindex="-1" role="dialog" aria-labelledby="Modal_add_hotelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_add_hotelLabel">เพิ่มข้อมูล Hotel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <label for="Modal_add_item_hotel">เพิ่มข้อมูล Hotel</label>
                <input type="text" class="form-control form-control-sm" id="Modal_add_item_hotel" placeholder="เพิ่มข้อมูล Hotel">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-success">บันทึก Hotel</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Edit Department -->
    <div class="modal fade" id="Modal_edit_department" tabindex="-1" role="dialog" aria-labelledby="Modal_edit_department" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_edit_departmentLabel">แก้ไขข้อมูล Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <label for="Modal_edit_item_department">แก้ไขข้อมูล Department</label>
                <input type="text" class="form-control form-control-sm" id="Modal_edit_item_department" placeholder="แก้ไขข้อมูล Department">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-success">บันทึก Department</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Edit Windows -->
    <div class="modal fade" id="Modal_edit_windows" tabindex="-1" role="dialog" aria-labelledby="Modal_edit_windows" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_edit_windowsLabel">แก้ไขข้อมูล Windows</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <label for="Modal_edit_item_windows">แก้ไขข้อมูล Windows</label>
                <input type="text" class="form-control form-control-sm" id="Modal_edit_item_windows" placeholder="แก้ไขข้อมูล Windows">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-success">บันทึก Windows</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Edit Hotel -->
    <div class="modal fade" id="Modal_edit_hotel" tabindex="-1" role="dialog" aria-labelledby="Modal_edit_hotel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_edit_hotelLabel">แก้ไขข้อมูล Hotel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <label for="Modal_edit_item_hotel">แก้ไขข้อมูล Hotel</label>
                <input type="text" class="form-control form-control-sm" id="Modal_edit_item_hotel" placeholder="แก้ไขข้อมูล Hotel">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-success">บันทึก Hotel</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="Modal_deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_deleteLabel">แจ้งเตือน ลบข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p><b>คุณกำลังจะลบข้อมูล หลังจากยืนยันการลบข้อมูลแล้วจะไม่สามารถเรียกข้อมูลนี้ได้ !</b></p>
            <p><b>คุณต้องการดำเนินการต่อหรือไม่ ?</b></p>
            <p><b>ลบข้อมูล : <span id="modal_delete_text"></span></b></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-danger btn-loading" id="Modal_delete_confrime">ยืนยัน ลบข้อมูล</button>
        </div>
        </div>
    </div>
    </div>

    <!-- END -->
    @include('../layout.footer')
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/addselectitem.js') }}"></script>
</html>