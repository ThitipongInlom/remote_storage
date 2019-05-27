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
                <h1 class="m-0 text-dark">ข้อมูลของคอม <a href="{{ url('dashboard') }}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-tachometer-alt"></i> แดชบอร์ด</a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">ข้อมูล</li>
                <li class="breadcrumb-item">{{ $Item[0]->sticker_number }}</li>
                <input type="hidden" id="id_computer" value="{{ $Item[0]->sticker_number }}">
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
            <div class="card card-primary">
                <div class="card-header">
                    <b>Guest</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($Item as $row)
                                <!-- Guest Name -->
                                @if ($row->guest_name == '' OR $row->guest_name != '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/user_name.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Name</a>
                                    @if ($row->guest_name == '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Guest Name" onclick="Add_item_data_form_view(this);">เพิ่ม Name</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Guest Name" old_value="{{ $row->guest_name }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Name</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->guest_name == '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->guest_name }}
                                    @endif
                                    </div>
                                </li>                       
                                @endif
                            @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($Item as $row)
                                <!-- Guest Dep -->
                                @if ($row->guest_dep == '' OR $row->guest_dep != '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/dep.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Dep</a>
                                    @if ($row->guest_dep == '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Guest Dep" onclick="Add_item_data_form_view(this);">เพิ่ม Dep</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Guest Dep" old_value="{{ $row->guest_dep }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Dep</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->guest_dep == '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->guest_dep }}
                                    @endif
                                    </div>
                                </li>                       
                                @endif
                            @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($Item as $row)
                                <!-- Guest Hotel -->
                                @if ($row->guest_hotel == '' OR $row->guest_hotel != '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/hotel.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Hotel</a>
                                    @if ($row->guest_hotel == '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Guest Hotel" onclick="Add_item_data_form_view(this);">เพิ่ม Hotel</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Guest Hotel" old_value="{{ $row->guest_hotel }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Hotel</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->guest_hotel == '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->guest_hotel }}
                                    @endif
                                    </div>
                                </li>                       
                                @endif
                            @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($Item as $row)
                                <!-- Guest Phone -->
                                @if ($row->guest_phone == '' OR $row->guest_phone != '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/phone.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Phone</a>
                                    @if ($row->guest_phone == '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Guest Phone" onclick="Add_item_data_form_view(this);">เพิ่ม Phone</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Guest Phone" old_value="{{ $row->guest_phone }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Phone</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->guest_phone == '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->guest_phone }}
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
    <div class="row">
        <!-- Hardware -->
        <div class="col-md-4">
            <div class="card card-primary">
            <div class="card-header">
                <b>Hardware</b>
            </div>
            <div class="overflow-auto" style="height: 350px;">
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="CPU" onclick="Add_item_data_form_view(this);">เพิ่ม CPU</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="CPU" old_value="{{ $row->cpu }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน CPU</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="RAM"  onclick="Add_item_data_form_view(this);">เพิ่ม RAM</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="RAM" old_value="{{ $row->ram }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน RAM</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Case" onclick="Add_item_data_form_view(this);">เพิ่ม Case</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Case" old_value="{{ $row->case }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Case</span>
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
                    @if ($row->monitor == '' OR $row->monitor != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/monitor.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Monitor</a>
                        @if ($row->monitor == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Monitor" onclick="Add_item_data_form_view(this);">เพิ่ม Monitor</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Monitor" old_value="{{ $row->monitor }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Monitor</span>
                        @endif
                        <span class="product-description">
                        @if ($row->monitor == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->monitor }}
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Mouse" onclick="Add_item_data_form_view(this);">เพิ่ม Mouse</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Mouse" old_value="{{ $row->mouse }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Mouse</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Keyboard" onclick="Add_item_data_form_view(this);">เพิ่ม Keyboard</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Keyboard" old_value="{{ $row->keyboard }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Keyboard</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Mainboard" onclick="Add_item_data_form_view(this);">เพิ่ม Mainboard</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Mainboard" old_value="{{ $row->mainboard }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Mainboard</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Power Supply" onclick="Add_item_data_form_view(this);">เพิ่ม PowerSupply</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Power Supply" old_value="{{ $row->powersupply }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน PowerSupply</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="HDD" onclick="Add_item_data_form_view(this);">เพิ่ม HDD</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="HDD" old_value="{{ $row->hdd }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน HDD</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="SSD" onclick="Add_item_data_form_view(this);">เพิ่ม SSD</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="SSD" old_value="{{ $row->ssd }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน SSD</span>
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
            <div class="card card-primary">
            <div class="card-header">
                <b>Software</b>
            </div>
            <div class="overflow-auto" style="height: 350px;">
            <div data-simplebar data-simplebar-auto-hide="false">
            <div class="card-body">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($Item as $row)
                    <!-- Teamviewer -->
                    @if ($row->teamviewer == '' OR $row->teamviewer != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/teamviewer.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Teamviewer</a>
                        @if ($row->teamviewer == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Teamviewer" onclick="Add_item_data_form_view(this);">เพิ่ม Teamviewer</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Teamviewer" old_value="{{ $row->teamviewer }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Teamviewer</span>
                        @endif
                        <span class="product-description">
                        @if ($row->teamviewer == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->teamviewer }}
                        @endif
                        </div>
                    </li>                       
                    @endif
                    <!-- Anydesk -->
                    @if ($row->anydesk == '' OR $row->anydesk != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/anydesk.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Anydesk</a>
                        @if ($row->anydesk == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Anydesk" onclick="Add_item_data_form_view(this);">เพิ่ม Anydesk</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Anydesk" old_value="{{ $row->anydesk }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Anydesk</span>
                        @endif
                        <span class="product-description">
                        @if ($row->anydesk == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->anydesk }}
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
        <!-- System -->
        <div class="col-md-4">
            <div class="card card-primary">
            <div class="card-header">
                <b>System</b>
            </div>
            <div class="overflow-auto" style="height: 350px;">
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="select" newname="Windows" onclick="Add_item_data_form_view(this);">เพิ่ม Windows</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="select" newname="Windows" old_value="{{ $row->windows }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Windows</span>
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
                    <!-- Computer Name -->
                    @if ($row->computer_name == '' OR $row->computer_name != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/computer_name.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Computer Name</a>
                        @if ($row->computer_name == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Computer Name" onclick="Add_item_data_form_view(this);">เพิ่ม Name</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Computer Name" old_value="{{ $row->computer_name }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Name</span>
                        @endif
                        <span class="product-description">
                        @if ($row->computer_name == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->computer_name }}
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="IP Address Main" onclick="Add_item_data_form_view(this);">เพิ่ม IP</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="IP Address Main" old_value="{{ $row->ip_main }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน IP</span>
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="IP Address Sub" onclick="Add_item_data_form_view(this);">เพิ่ม IP</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="IP Address Sub" old_value="{{ $row->ip_sub }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน IP</span>
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
                    <!-- Internet -->
                    @if ($row->internet == '' OR $row->internet != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/internet.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Internet</a>
                        @if ($row->internet == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="IP Address Sub" onclick="Add_item_data_form_view(this);">เพิ่ม Internet</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="IP Address Sub" old_value="{{ $row->ip_sub }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Internet</span>
                        @endif
                        <span class="product-description">
                        @if ($row->internet == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->internet }}
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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <b>ข้อมูลประวัติย้อนหลัง</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-sm dt-responsive nowrap row-border table-bordered table-hover dt-responsive display nowrap" cellspacing="0" cellpadding="0" id="Table_Main">
                        <thead>
                            <tr class="bg-primary">
                                <th>Sticker</th>
                                <th>วันที่</th>
                                <th>ประเภท</th>
                                <th>ข้อมูลเก่า</th>
                                <th>ข้อมูลใหม่</th>
                                <th>หมายเหตุ</th>
                                <th>สถานะ</th>
                                <th>ผู้ทำการ</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-primary">
                                <th>Sticker</th>
                                <th>วันที่</th>
                                <th>ประเภท</th>
                                <th>ข้อมูลเก่า</th>
                                <th>ข้อมูลใหม่</th>
                                <th>หมายเหตุ</th>
                                <th>สถานะ</th>
                                <th>ผู้ทำการ</th>
                            </tr>
                        </tfoot>
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

    <!-- Modal Add -->
    <div class="modal fade" id="Modal_add_item" tabindex="-1" role="dialog" aria-labelledby="Modal_add_itemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content card-primary card-outline">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_add_itemLabel">เพิ่มข้อมูล <span class="Modal_add_item_name"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Show = Input -->
            <div class="form-group" id="Modal_add_input">
                <label for="Modal_add_item_input">ข้อมูลของ <span class="Modal_add_item_name"></span></label>
                <input type="text" class="form-control form-control-sm" id="Modal_add_item_input" placeholder="กรุณาใส่ข้อมูลที่ต้องการ">
            </div>
            <!-- Show = Select -->
            <div class="form-group" id="Modal_add_select">
                <label for="Modal_add_item_select">ข้อมูลของ <span class="Modal_add_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_add_item_select">
                <option value="Windows XP">Windows XP</option>
                <option value="Windows 7">Windows 7</option>
                <option value="Windows 8">Windows 8</option>
                <option value="Windows 10">Windows 10</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-primary btn-loading" id="Add_item_data_form_view_save" onclick="Add_item_data_form_view_save(this);">ยืนยันการบันทึก</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="Modal_edit_item" tabindex="-1" role="dialog" aria-labelledby="Modal_edit_itemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content card-primary card-outline">
        <div class="modal-header">
            <h5 class="modal-title" id="Modal_edit_itemLabel">เปลี่ยนข้อมูล <span class="Modal_edit_item_name"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Show = Input -->
            <div class="form-group" id="Modal_edit_input">
                <label for="Modal_edit_item_input">ข้อมูลเก่าของ <span class="Modal_edit_item_name"></span></label>
                <input type="text" class="form-control form-control-sm" id="Modal_edit_item_input" placeholder="กรุณาใส่ข้อมูลที่ต้องการ">
            </div>
            <!-- Show = Select -->
            <div class="form-group" id="Modal_edit_select">
                <label for="Modal_edit_item_select">ข้อมูลเก่าของ <span class="Modal_edit_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_edit_item_select">
                <option value="Windows XP">Windows XP</option>
                <option value="Windows 7">Windows 7</option>
                <option value="Windows 8">Windows 8</option>
                <option value="Windows 10">Windows 10</option>
                </select>
            </div>
            <!-- Remark -->
                <label for="Modal_edit_item_remark">หมายเหตุ</label>
                <input type="text" class="form-control form-control-sm" id="Modal_edit_item_remark" placeholder="หมายเหตุ">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-sm btn-primary btn-loading" id="Edit_item_data_form_view_save" onclick="Edit_item_data_form_view_save(this);">ยืนยันการแก้ไข</button>
        </div>
        </div>
    </div>
    </div>
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/viewitem.js') }}"></script>
        <!-- Script In Page -->
        <script>
        $.fn.dataTable.ext.errMode = 'throw';
        var TableDisplay = $('#Table_Main').DataTable({
            "dom": "<'row'<'col-sm-1'l><'col-sm-7'><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-1'i><'col-sm-7'><'col-sm-4'p>>",
            "processing": true,
            "serverSide": true,
            "bPaginate": true,
            "responsive": true,
            "order": [
                [1, 'desc']
            ],
            "aLengthMenu": [
                [5, 10, 20, -1],
                ["5", "10", "20", "ทั้งหมด"]
            ],
            "ajax": {
                "url": "../api/v1/ajax_load_item_view_history/{{ $Item[0]->sticker_number }}",
                "type": 'POST',
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            "columns": [{
                    "data": 'sticker_number',
                    "name": 'sticker_number',
                },
                {
                    "data": 'created_at',
                    "name": 'created_at'
                },
                {
                    "data": 'item_type',
                    "name": 'item_type'
                },
                {
                    "data": 'item_old',
                    "name": 'item_old'
                },
                {
                    "data": 'item_change',
                    "name": 'item_change'
                },
                {
                    "data": 'remark',
                    "name": 'remark'
                },
                {
                    "data": 'item_status',
                    "name": 'item_status'
                },
                {
                    "data": 'users_change',
                    "name": 'users_change'
                }
            ],
            "columnDefs": [{
                    "className": 'text-left',
                    "targets": [3, 4, 5]
                },
                {
                    "className": 'text-center',
                    "targets": [0, 1, 2, 6, 7]
                },
                {
                    "className": 'text-right',
                    "targets": []
                },
            ],
            "language": {
                "lengthMenu": "แสดง _MENU_ แถว",
                "search": "ค้นหา:",
                "info": "แสดง _START_ ถึง _END_ ทั้งหมด _TOTAL_ แถว",
                "infoEmpty": "แสดง 0 ถึง 0 ทั้งหมด 0 แถว",
                "infoFiltered": "(จาก ทั้งหมด _MAX_ ทั้งหมด แถว)",
                "processing": "กำลังโหลดข้อมูล...",
                "zeroRecords": "ไม่มีข้อมูล",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ต่อไป",
                    "previous": "ย้อนกลับ"
                },
            },
            search: {
                "regex": true
            },
        });
        </script>
</html>