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
                <h1 class="m-0 text-dark">แดชบอร์ด รีโมท</h1>
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
                    <div class="float-left mb-2">
                        <h3>แดชบอร์ด</h3>
                    </div>
                    <div class="float-right text-right mb-3">
                        <select class="custom-select custom-select-sm col-8" id="type_select_table" onchange="load_table_on_select();">
                            <option value="return_all" selected="">ข้อมูลคอมพิวเตอร์ทั้งหมด</option>
                            <option value="return_yes">ข้อมูลคอมพิวเตอร์ที่ ใช้งาน</option>
                            <option value="return_no">ข้อมูลคอมพิวเตอร์ที่ ไม่ได้ใช้งาน</option>
                            <option value="return_wait">ข้อมูลคอมพิวเตอร์ที่ ส่งซ่อม</option>
                        </select>
                        <a href="{{ url('additem') }}" class="btn btn-sm btn-success" role="button" data-toggle="tooltip" data-placement="bottom" title="เพิ่มข้อมูลคอมพิวเตอร์"><i class="fas fa-plus"></i> เพิ่มข้อมูล</a>
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
    <!-- END -->
    @include('../layout.footer')
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/dashboard.js') }}"></script>
</html>