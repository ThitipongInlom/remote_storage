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
                <h1 class="m-0 text-dark">ข้อมูลของคอม</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">ข้อมูล</li>
                <li class="breadcrumb-item">{{ $Item[0]->sticker_number }}</li>
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
        <!-- Hardware -->
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                <b>Hardware</b>
            </div>
            <div class="overflow-auto" style="height: 450px;">
            <div data-simplebar data-simplebar-auto-hide="false">
            <div class="card-body">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($Item as $row)
                    @if ($row->cpu == '' OR $row->cpu != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/cpu.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">CPU</a>
                        @if ($row->cpu == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม CPU</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข CPU</span>
                        @endif
                        <span class="product-description">
                        @if ($row->cpu == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->cpu }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->ram == '' OR $row->ram != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/ram.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">RAM</a>
                        @if ($row->ram == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม RAM</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข RAM</span>
                        @endif
                        <span class="product-description">
                        @if ($row->ram == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->ram }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->case == '' OR $row->case != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/case.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Case</a>
                        @if ($row->case == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม Case</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข Case</span>
                        @endif
                        <span class="product-description">
                        @if ($row->case == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->case }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->mouse == '' OR $row->mouse != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/mouse.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Mouse</a>
                        @if ($row->mouse == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม Mouse</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข Mouse</span>
                        @endif
                        <span class="product-description">
                        @if ($row->mouse == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->mouse }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->keyboard == '' OR $row->keyboard != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/keyboard.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Keyboard</a>
                        @if ($row->keyboard == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม Keyboard</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข Keyboard</span>
                        @endif
                        <span class="product-description">
                        @if ($row->keyboard == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->keyboard }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->mainboard == '' OR $row->mainboard != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/mainboard.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Mainboard</a>
                        @if ($row->mainboard == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม Mainboard</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข Mainboard</span>
                        @endif
                        <span class="product-description">
                        @if ($row->mainboard == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->mainboard }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->powersupply == '' OR $row->powersupply != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/powersupply.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Power Supply</a>
                        @if ($row->powersupply == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม Power Supply</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข Power Supply</span>
                        @endif
                        <span class="product-description">
                        @if ($row->powersupply == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->powersupply }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->hdd == '' OR $row->hdd != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/hdd.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">HDD</a>
                        @if ($row->hdd == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม HDD</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข HDD</span>
                        @endif
                        <span class="product-description">
                        @if ($row->hdd == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->hdd }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                    @if ($row->ssd == '' OR $row->ssd != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/ssd.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">SSD</a>
                        @if ($row->ssd == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม SSD</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข SSD</span>
                        @endif
                        <span class="product-description">
                        @if ($row->ssd == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->ssd }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                @endforeach
                </ul>
            </div>
            </div>
            </div>
            </div>
        </div>
        <!-- Software -->
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                <b>Software</b>
            </div>
            <div class="overflow-auto" style="height: 450px;">
            <div data-simplebar data-simplebar-auto-hide="false">
            <div class="card-body">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/teamviewer.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Samsung TV
                            <span class="badge badge-warning float-right">$1800</span></a>
                        <span class="product-description">
                            Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
            </div>
            </div>
        </div>
        <!-- System -->
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                <b>System</b>
            </div>
            <div class="overflow-auto" style="height: 450px;">
            <div data-simplebar data-simplebar-auto-hide="false">
            <div class="card-body">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($Item as $row)
                    <!-- Windows -->
                    @if ($row->windows == '' OR $row->windows != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/windows.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Windows</a>
                        @if ($row->windows == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม Windows</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข Windows</span>
                        @endif
                        <span class="product-description">
                        @if ($row->windows == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->windows }}
                        @endif
                        </div>
                    </li>                       
                    @endif
                    <!-- IP Main -->
                    @if ($row->ip_main == '' OR $row->ip_main != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/ip.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">IP Address Main</a>
                        @if ($row->ip_main == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม IP</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข IP</span>
                        @endif
                        <span class="product-description">
                        @if ($row->ip_main == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->ip_main }}
                        @endif
                        </div>
                    </li>                       
                    @endif
                    <!-- IP Sub -->
                    @if ($row->ip_sub == '' OR $row->ip_sub != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/ip.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">IP Address Sub</a>
                        @if ($row->ip_sub == '')
                            <span class="btn btn-sm badge badge-success float-right">เพิ่ม IP</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right">แก้ไข IP</span>
                        @endif
                        <span class="product-description">
                        @if ($row->ip_sub == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->ip_sub }}
                        @endif
                        </div>
                    </li>                       
                    @endif
                @endforeach
                </ul>
            </div>
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
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
</html>