<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-end mb-0">
        <li class="dropdown d-inline-block d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('assets/images/users/profile.jpg') }}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ms-1">
                    {{ auth()->user()->first_name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
    <div class="logo-box">
        <a href="{{ route('index') }}" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" height="30">
            </span>
        </a>
        <a href="{{ route('index') }}" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" height="30">
            </span>
        </a>
    </div>
    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main">{{ $pageTitle }}</h4>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>
