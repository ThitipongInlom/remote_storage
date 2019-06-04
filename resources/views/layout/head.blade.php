<div class="wrapper">

<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" >
        <span href="#" class="nav-link"><b>ทางลัดเปิดโปรแกรม :</b></span>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="IP">
        <span href="#" class="nav-link">
            <img src="{{ url('img/cmd.png') }}" style="width: 24px;" class="card-img-top">
            @if (isset($Item))
                <b>{{ $Item[0]->ip_main }}</b>
            @endif
        </span>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="Anydesk">
        <span href="#" class="nav-link">
            <img src="{{ url('img/anydesk.png') }}" style="width: 24px;" class="card-img-top">
            @if (isset($Item))
                <b>{{ $Item[0]->anydesk }}</b>
            @endif        
        </span>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="Teamviewer">
        <span href="#" class="nav-link">
            <img src="{{ url('img/teamviewer.png') }}" style="width: 24px;" class="card-img-top">
            @if (isset($Item))
                <b>{{ $Item[0]->teamviewer }}</b>
            @endif           
        </span>
    </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
<div class="btn-group">
  <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-sliders-h"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="{{ route('logout') }}" role="button">ออกจากระบบ</a>
  </div>
</div>
    </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <p>แดชบอร์ด รีโมท</p>
            </a>
        </li>
        @if (isset($Item))
            @php 
                $urlviewitem = $Item[0]->sticker_number; 
            @endphp
        @else
            @php 
                $urlviewitem = ""; 
            @endphp       
        @endif 
        <li class="nav-item has-treeview
            {{ Request::is("view/$urlviewitem") ? 'menu-open' : '' }}
            {{ Request::is("additem") ? 'menu-open' : '' }}
        ">
            <a href="#" class="nav-link 
            {{ Request::is("view/$urlviewitem") ? 'active' : '' }}
            {{ Request::is("additem") ? 'active' : '' }}
        ">
            <i class="fas fa-database"></i>
            <p>
                ข้อมูล
                <i class="right fa fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('additem') }}" class="nav-link {{ Request::is("additem") ? 'active' : '' }}">
                <i class="fas fa-plus"></i>
                <p>เพิ่มข้อมูล</p>
                </a>
            </li>
            <li class="nav-item">
                @if (isset($Item))
                    @php 
                        $urlviewitem = $Item[0]->sticker_number; 
                    @endphp
                    <a href="#" class="nav-link {{ Request::is("view/$urlviewitem") ? 'active' : '' }} disabled">
                @else
                    <a href="#" class="nav-link disabled">
                @endif  
                <i class="fas fa-search"></i>
                <p> แสดงข้อมูล</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item has-treeview
            {{ Request::is("addselectitem") ? 'menu-open' : '' }}
        ">
            <a href="#" class="nav-link
            {{ Request::is("addselectitem") ? 'active' : '' }}
        ">
            <i class="fas fa-cogs"></i>
            <p>
                 ตั้งค่า
                <i class="right fa fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('addselectitem') }}" class="nav-link {{ Request::is("addselectitem") ? 'active' : '' }}">
                <i class="fas fa-tools"></i>
                <p>เพิ่ม  แผนก / โรงแรม / ระบบ</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ url('dashboardstore') }}" class="nav-link {{ Request::is('dashboardstore') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <p>แดชบอร์ด สต้อก</p>
            </a>
        </li>
        </ul>
    </nav>
    </div>
</aside>