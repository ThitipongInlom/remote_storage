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
    @foreach ($Item as $row)
    <div class="content">
    <div class="container-fluid">
    <!-- จำนวนข้อมูลทั้งหมด -->    
    <div class="row">
        <div class="col-md-12">
            <div class="card {{ $color['card_color'] }}">
                <div class="card-header pb-2">
                    <b><i class="fas fa-id-card-alt"></i> Guest</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-dark" update="Y" onclick="Update_status_com(this);"><i class='fas fa-check' data-toggle='tooltip' data-placement='bottom' title='คอมพิวเตอร์ ใช้งาน'></i> ใช้งาน</button>
                        <button type="button" class="btn btn-sm btn-dark" update="N" onclick="Update_status_com(this);"><i class='fas fa-times' data-toggle='tooltip' data-placement='bottom' title='คอมพิวเตอร์ ไม่ได้ใช้งาน'></i> ไม่ได้ใช้งาน</button>
                        <button type="button" class="btn btn-sm btn-dark" update="W" onclick="Update_status_com(this);"><i class='fas fa-tools' data-toggle='tooltip' data-placement='bottom' title='คอมพิวเตอร์ ส่งซ่อม'></i> ส่งซ่อม</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <!-- Guest Name -->
                                @if ($row->name== '' OR $row->name!= '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/user_name.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Name</a>
                                    @if ($row->name== '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Guest Name" onclick="Add_item_data_form_view(this);">เพิ่ม Name</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Guest Name" old_value="{{ $row->name}}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Name</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->name== '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->name}}
                                    @endif
                                    </div>
                                </li>                       
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <!-- Guest Dep -->
                                @if ($row->dep== '' OR $row->dep!= '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/dep.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Dep</a>
                                    @if ($row->dep== '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="select_dep" newname="Guest Dep" onclick="Add_item_data_form_view(this);">เพิ่ม Dep</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="select_dep" newname="Guest Dep" old_value="{{ $row->dep}}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Dep</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->dep== '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->dep}}
                                    @endif
                                    </div>
                                </li>                       
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <!-- Guest Hotel -->
                                @if ($row->hotel== '' OR $row->hotel!= '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/hotel.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Hotel</a>
                                    @if ($row->hotel== '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="select_hotel" newname="Guest Hotel" onclick="Add_item_data_form_view(this);">เพิ่ม Hotel</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="select_hotel" newname="Guest Hotel" old_value="{{ $row->hotel}}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Hotel</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->hotel== '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->hotel}}
                                    @endif
                                    </div>
                                </li>                       
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <!-- Guest Phone -->
                                @if ($row->phone== '' OR $row->phone!= '')
                                <li class="item">
                                    <div class="product-img">
                                    <img src="{{ url('img/icon/phone.png') }}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Phone</a>
                                    @if ($row->phone== '')
                                        <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Guest Phone" onclick="Add_item_data_form_view(this);">เพิ่ม Phone</span>
                                    @else
                                        <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Guest Phone" old_value="{{ $row->phone}}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Phone</span>
                                    @endif
                                    <span class="product-description">
                                    @if ($row->phone== '')
                                        <p>ยังไม่มีข้อมูล</p>
                                    @else
                                        {{ $row->phone}}
                                    @endif
                                    </div>
                                </li>                       
                                @endif
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
            <div class="card {{ $color['card_color'] }}">
            <div class="card-header">
                <b><i class="fas fa-server"></i> Hardware</b>
            </div>
            <div class="overflow-auto" style="height: 350px;">
            <div data-simplebar data-simplebar-auto-hide="false">
            <div class="card-body">
                <ul class="products-list product-list-in-card pl-2 pr-2">
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
                    @if ($row->ups == '' OR $row->ups != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/ups.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">UPS</a>
                        @if ($row->ups == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="UPS" onclick="Add_item_data_form_view(this);">เพิ่ม UPS</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="UPS" old_value="{{ $row->ups }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน UPS</span>
                            <br>
                            <span class="btn btn-sm badge badge-danger float-right" datashow="input" newname="UPS Battery" old_value="{{ $row->ups_battery }}" onclick="Edit_item_data_form_view(this);">เปลี่ยนแบต</span>
                        @endif
                        <span class="product-description">
                        @if ($row->ups == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->ups }}
                        @endif
                        </span>
                        </div>
                    </li>                       
                    @endif
                </ul>
            </div>
            </div>
            </div>
            </div>
        </div>
        <!-- Software -->
        <div class="col-md-4">
            <div class="card {{ $color['card_color'] }}">
            <div class="card-header">
                <b><i class="fas fa-server"></i> Software</b>
            </div>
            <div class="overflow-auto" style="height: 350px;">
            <div data-simplebar data-simplebar-auto-hide="false">
            <div class="card-body">
                <ul class="products-list product-list-in-card pl-2 pr-2">
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
                    <!-- Username Admin -->
                    @if ($row->username_admin == '' OR $row->username_admin != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/computer_name.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Username Admin</a>
                        @if ($row->username_admin == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Username_Admin" onclick="Add_item_data_form_view(this);">เพิ่ม Username Admin</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Username_Admin" old_value="{{ $row->username_admin }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Username Admin</span>
                        @endif
                        <span class="product-description">
                        @if ($row->username_admin == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->username_admin }}
                        @endif
                        </div>
                    </li>                       
                    @endif
                    <!-- Password Admin -->
                    @if ($row->password_admin == '' OR $row->password_admin != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/computer_name.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Password Admin</a>
                        @if ($row->password_admin == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="input" newname="Password_Admin" onclick="Add_item_data_form_view(this);">เพิ่ม Password Admin</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="input" newname="Password_Admin" old_value="{{ $row->password_admin }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Password Admin</span>
                        @endif
                        <span class="product-description">
                        @if ($row->password_admin == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->password_admin }}
                        @endif
                        </div>
                    </li>                       
                    @endif
                </ul>
            </div>
            </div>
            </div>
            </div>
        </div>
        <!-- System -->
        <div class="col-md-4">
            <div class="card {{ $color['card_color'] }}">
            <div class="card-header">
                <b><i class="fas fa-server"></i> System</b>
            </div>
            <div class="overflow-auto" style="height: 350px;">
            <div data-simplebar data-simplebar-auto-hide="false">
            <div class="card-body">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    <!-- Windows -->
                    @if ($row->windows == '' OR $row->windows != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/windows.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Windows</a>
                        @if ($row->windows == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="select_windows" newname="Windows" onclick="Add_item_data_form_view(this);">เพิ่ม Windows</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="select_windows" newname="Windows" old_value="{{ $row->windows }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Windows</span>
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
                    <!-- Windows license -->
                    @if ($row->license == '' OR $row->license != '')
                     <li class="item">
                        <div class="product-img">
                        <img src="{{ url('img/icon/license.png') }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">Windows license</a>
                        @if ($row->license == '')
                            <span class="btn btn-sm badge badge-success float-right" datashow="windows_license" newname="License" onclick="Add_item_data_form_view(this);">เพิ่ม license</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="windows_license" newname="License" old_value="{{ $row->license }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน license</span>
                        @endif
                        <span class="product-description">
                        @if ($row->license == '')
                            <p>ยังไม่มีข้อมูล</p>
                        @else
                            {{ $row->license }}
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
                            <span class="btn btn-sm badge badge-success float-right" datashow="radio_internet" newname="Internet" onclick="Add_item_data_form_view(this);">เพิ่ม Internet</span>
                        @else
                            <span class="btn btn-sm badge badge-warning float-right" datashow="radio_internet" newname="Internet" old_value="{{ $row->internet }}" onclick="Edit_item_data_form_view(this);">เปลี่ยน Internet</span>
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
                </ul>
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card {{ $color['card_color'] }}">
                <div class="card-header">
                    <b><i class="fas fa-list"></i> ข้อมูลประวัติย้อนหลัง</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-sm dt-responsive nowrap row-border table-bordered table-hover dt-responsive display nowrap" cellspacing="0" cellpadding="0" id="Table_Main">
                        <thead>
                            <tr class="{{ $color['bg_color'] }}">
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
                            <tr class="{{ $color['bg_color'] }}">
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
    @endforeach
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
            <!-- Show = Select Dep -->
            <div class="form-group" id="Modal_add_select_dep">
                <label for="Modal_add_item_select_dep">ข้อมูลของ <span class="Modal_add_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_add_item_select_dep">
                @foreach ($Department as $row)
                    <option value="{{ $row->department_titel }}">{{ $row->department_titel }} - {{ $row->department_main }}</option>
                @endforeach
                </select>
            </div>
            <!-- Show = Select Hotel -->
            <div class="form-group" id="Modal_add_select_hotel">
                <label for="Modal_add_item_select_hotel">ข้อมูลของ <span class="Modal_add_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_add_item_select_hotel">
                @foreach ($Hotel as $row)
                    <option value="{{ $row->hotel_titel }}">{{ $row->hotel_titel }}</option>
                @endforeach
                </select>
            </div>
            <!-- Show = Select Windows -->
            <div class="form-group" id="Modal_add_select_windows">
                <label for="Modal_add_item_select_windows">ข้อมูลของ <span class="Modal_add_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_add_item_select_windows">
                @foreach ($Window as $row)
                    <option value="{{ $row->window_titel }}">{{ $row->window_titel }}</option>
                @endforeach
                </select>
            </div>
            <!-- Show = radio internet -->
            <div class="form-group" id="Modal_add_radio_internet">
                <label for="Modal_add_item_select_windows">ข้อมูลเก่าของ <span class="Modal_add_item_name"></span></label>
                <br>
                <div align="center">
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="internet_add_1" name="internet_add" class="custom-control-input" value="Enable">
                <label class="custom-control-label" for="internet_add_1">เปิด</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="internet_add_2" name="internet_add" class="custom-control-input" value="Disable">
                <label class="custom-control-label" for="internet_add_2">ปิด</label>
                </div>
                </div>
            </div>
            <!-- Show = radio Windows license -->
            <div class="form-group" id="Modal_add_radio_windows_license">
                <label for="Modal_add_radio_windows_license">ข้อมูลเก่าของ <span class="Modal_add_item_name"></span></label>
                <br>
                <div align="center">
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="windows_license_add_1" name="windows_license_add" class="custom-control-input" value="Active">
                <label class="custom-control-label" for="windows_license_add_1">Windows แท้</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="windows_license_add_2" name="windows_license_add" class="custom-control-input" value="Not Active">
                <label class="custom-control-label" for="windows_license_add_2">Windows เถื่อน</label>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="display:inline;">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-sm btn-block btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ยกเลิก</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-sm btn-block btn-success btn-loading" id="Add_item_data_form_view_save" onclick="Add_item_data_form_view_save(this);"> <i class="far fa-save"></i> ยืนยันการบันทึก</button>
                </div>
            </div>
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
                <label for="Modal_edit_item_input">แก้ไขข้อมูล <span class="Modal_edit_item_name"></span></label>
                <input type="text" class="form-control form-control-sm" id="Modal_edit_item_input" placeholder="กรุณาใส่ข้อมูลที่ต้องการ">
            </div>
            <!-- Show = Select Dep -->
            <div class="form-group" id="Modal_edit_select_dep">
                <label for="Modal_edit_item_select_dep">แก้ไขข้อมูล <span class="Modal_edit_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_edit_item_select_dep">
                @foreach ($Department as $row)
                    <option value="{{ $row->department_titel }}">{{ $row->department_titel }} - {{ $row->department_main }}</option>
                @endforeach
                </select>
            </div>
            <!-- Show = Select Hotel -->
            <div class="form-group" id="Modal_edit_select_hotel">
                <label for="Modal_edit_item_select_hotel">แก้ไขข้อมูล <span class="Modal_add_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_edit_item_select_hotel">
                @foreach ($Hotel as $row)
                    <option value="{{ $row->hotel_titel }}">{{ $row->hotel_titel }}</option>
                @endforeach
                </select>
            </div>
            <!-- Show = Select Windows -->
            <div class="form-group" id="Modal_edit_select_windows">
                <label for="Modal_edit_item_select_windows">แก้ไขข้อมูล <span class="Modal_edit_item_name"></span></label>
                <select class="custom-select custom-select-sm" id="Modal_edit_item_select_windows">
                @foreach ($Window as $row)
                    <option value="{{ $row->window_titel }}">{{ $row->window_titel }}</option>
                @endforeach
                </select>
            </div>
            <!-- Show = radio internet -->
            <div class="form-group" id="Modal_edit_radio_internet">
                <label for="Modal_edit_item_select_windows">แก้ไขข้อมูล <span class="Modal_edit_item_name"></span></label>
                <br>
                <div align="center">
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="internet_edit_1" name="internet_edit" class="custom-control-input" value="Enable">
                <label class="custom-control-label" for="internet_edit_1">เปิด</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="internet_edit_2" name="internet_edit" class="custom-control-input" value="Disable">
                <label class="custom-control-label" for="internet_edit_2">ปิด</label>
                </div>
                </div>
            </div>
            <!-- Show = radio Windows license -->
            <div class="form-group" id="Modal_edit_radio_windows_license">
                <label for="Modal_edit_radio_windows_license">แก้ไขข้อมูล <span class="Modal_edit_item_name"></span></label>
                <br>
                <div align="center">
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="windows_license_edit_1" name="windows_license_edit" class="custom-control-input" value="Active">
                <label class="custom-control-label" for="windows_license_edit_1">Windows แท้</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="windows_license_edit_2" name="windows_license_edit" class="custom-control-input" value="Not Active">
                <label class="custom-control-label" for="windows_license_edit_2">Windows เถื่อน</label>
                </div>
                </div>
            </div>
            <!-- Remark -->
                <label for="Modal_edit_item_remark">หมายเหตุ</label>
                <input type="text" class="form-control form-control-sm" id="Modal_edit_item_remark" placeholder="หมายเหตุ">
        </div>
        <div class="modal-footer" style="display:inline;">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-sm btn-block btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ยกเลิก</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-sm btn-block btn-success btn-loading" id="Edit_item_data_form_view_save" onclick="Edit_item_data_form_view_save(this);"><i class="far fa-save"></i> ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </body>
        <!-- All Js -->
        <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/viewitem.js') }}"></script>
</html>