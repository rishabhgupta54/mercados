<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <span href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
            </div>
        </div>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#users" data-bs-toggle="collapse">
                        <i class="fa fa-user-alt"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('users.index') }}">List Users</a>
                            </li>
                            <li>
                                <a href="{{ route('users.create') }}">Create User</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
