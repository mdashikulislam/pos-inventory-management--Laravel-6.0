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
                        <p>View Users</p>
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
        <li class="nav-item has-treeview {{($prefix == '/supplier') ? 'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Manage Suppliers
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('supplier.view')}}" class="nav-link {{($route == 'supplier.view') ? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Suppliers</p>
                        </a>
                    </li>

                </ul>
            </li>
        <li class="nav-item has-treeview {{($prefix == '/customer') ? 'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Manage Customer
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('customer.view')}}" class="nav-link {{($route == 'customer.view') ? 'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Customer</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix == '/unit') ? 'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Manage Units
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('unit.view')}}" class="nav-link {{($route == 'unit.view') ? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Units</p>
                        </a>
                    </li>

                </ul>
        </li>
            <li class="nav-item has-treeview {{($prefix == '/category') ? 'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Manage Category
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('category.view')}}" class="nav-link {{($route == 'category.view') ? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Category</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-treeview {{($prefix == '/product') ? 'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Manage Products
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('product.view')}}" class="nav-link {{($route == 'product.view') ? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Products</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-treeview {{($prefix == '/purchase') ? 'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Manage Purchase
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('purchase.view')}}" class="nav-link {{($route == 'purchase.view') ? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('purchase.pending')}}" class="nav-link {{($route == 'purchase.pending') ? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pending Purchase</p>
                        </a>
                    </li>
                </ul>
            </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
