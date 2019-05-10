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
                <h1 class="m-0 text-dark">แดชบอร์ด</h1>
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
    <!-- จำนวนเงินที่มีทั้งหมด ของ Users -->    
            <div class="table-responsive">
            <table class="table table-sm dt-responsive nowrap row-border table-bordered table-hover dt-responsive display nowrap" cellspacing="0" cellpadding="0" id="Table_Main">
                <thead>
                    <tr>
                        <th>Sticker</th>
                        <th>Name</th>
                        <th>Computer Name</th>
                        <th>Teamviewer</th>
                        <th>Anydesk</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sticker</th>
                        <th>Name</th>
                        <th>Computer Name</th>
                        <th>Teamviewer</th>
                        <th>Anydesk</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
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