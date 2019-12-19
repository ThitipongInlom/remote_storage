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
                <h1 class="m-0 text-dark">แดชบอร์ด สต้อก</h1>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-inline">
                                <label for="select_month" class="col-sm-2 col-form-label col-form-label-sm" data-toggle="tooltip" data-placement="bottom" title="เลือก เดือน"><i class="fas fa-calendar-alt fa-2x"></i></label>
                                <input type="text" data-toggle="datepicker" data-min-view="months" data-view="months" data-date-format="MM yyyy"class="form-control form-control-sm" id="select_month" placeholder="เลือกเดือน">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12" align="center">
                                <label class="col-form-label col-form-label-sm"><h5>ข้อมูลเดือน : <span id="table_tital">เดือนปัจจุบัน</span></h5></label>
                            </div>
                            <div class="col-md-4 col-sm-12" align="right">
                                <button class="btn btn-sm btn-success" onclick="Add_store();">เพิ่มข้อมูล</button>
                            </div>
                        </div>
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-sm dt-responsive nowrap row-border table-bordered table-hover dt-responsive display nowrap" cellspacing="0" cellpadding="0" id="Table_Main" width="100%">
                        <thead>
                            <tr class="bg-primary">
                                <th>Equipment</th>
                                <th>Buy to Date</th>
                                <th>TotalMax</th>
                                <th>เบิกใช้งาน</th>
                                <th>ยืมใช้งาน</th>
                                <th>TotalSum</th>
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
    </div>
    </div>
    <!-- END -->
    @include('../layout.footer')
    <!-- Modal Add Item -->
    <div class="modal fade" id="Add_store" tabindex="-1" role="dialog" aria-labelledby="Add_storeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Add_storeLabel">เพิ่มข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-sm btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Use_select_item -->
    <div class="modal fade" id="Use_select_item" tabindex="-1" role="dialog" aria-labelledby="Use_select_itemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Use_select_itemLabel">เลือกรายการที่ต้องการใช้งาน</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
        </div>
    </div>
    </div>
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/dashboardstore.js') }}"></script>
</html>