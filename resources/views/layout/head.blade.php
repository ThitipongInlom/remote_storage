<div class="wrapper">

<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" >
        <span href="#" class="nav-link"><b>ทางลัดเปิดโปรแกรม :</b></span>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="Ping">
        <span href="#" class="nav-link"><img src="{{ url('img/cmd.png') }}" style="width: 24px;" class="card-img-top"></span>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="Anydesk">
        <span href="#" class="nav-link"><img src="{{ url('img/anydesk.png') }}" style="width: 24px;" class="card-img-top"></span>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="cursor: pointer;" data-toggle="tooltip" data-placement="bottom" title="Teamviewer">
        <span href="#" class="nav-link"><img src="{{ url('img/teamviewer.png') }}" style="width: 24px;" class="card-img-top"></span>
    </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <!--<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                class="fa fa-th-large"></i></a> -->
    </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview
            {{ Request::is('dashboard') ? 'menu-open' : '' }}
        ">
            <a href="#" class="nav-link 
            {{ Request::is('dashboard') ? 'active' : '' }}
        ">
            <i class="fas fa-tachometer-alt"></i>
            <p>
                ข้อมูล
                <i class="right fa fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <p>แดชบอร์ด</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p>ออกจากระบบ</p>
            </a>
        </li>
        </ul>
    </nav>
    </div>
</aside>