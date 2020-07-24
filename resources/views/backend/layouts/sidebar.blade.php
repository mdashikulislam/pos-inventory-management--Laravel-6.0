@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->usertype == 'admin')
        <li class="nav-item has-treeview {{($prefix == '/user') ? 'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Manage Users
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item " >
                    <a href="{{route('users.view')}}" class="nav-link {{($route == 'users.view') ? 'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View User</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-item has-treeview {{($prefix == '/profile') ? 'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Manage Profile
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('profile.view')}}" class="nav-link {{($route == 'profile.view') ? 'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('profile.change_password')}}" class="nav-link {{($route == 'profile.change_password') ? 'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
