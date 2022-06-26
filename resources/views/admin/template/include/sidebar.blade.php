<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">Wiki Mobile</span>
</a>
<!-- Sidebar -->
<div class="sidebar">
@php
    use Illuminate\Support\Facades\Auth;$admin_user = Auth::user();
@endphp
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="/admin/user/{{$admin_user->id}}">
            <div class="image">
                <img src="{{$admin_user->avatar}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <br>
            <div class="info">
                <a href="/admin/user/{{$admin_user->id}}" class="d-block">{{$admin_user->fullName}}</a>
            </div>
        </a>
    </div>
{{--    <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--        <div class="info">--}}
{{--            <button class="btn btn-primary" id="btn-logout">Logout</button>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- SidebarSearch Form -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="/admin" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item {{request()->is('admin/category*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/category*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Manage Category<i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/category/create" class="nav-link {{request()->is('admin/category/create') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create New Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/category" class="nav-link {{request()->is('admin/category') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All & Search</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/export-excel/excel/category" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Export Excel</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{request()->is('admin/brand*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/brand*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                        Manage Brand
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/brand/create" class="nav-link {{request()->is('admin/brand/create') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create New Brand</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/brand" class="nav-link {{request()->is('admin/brand') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All & Search</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/export-excel/excel/brand" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Export Excel</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{request()->is('admin/mobile*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/mobile*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-mobile-alt"></i>
                    <p>
                        Manage Mobile
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/mobile/create" class="nav-link {{request()->is('admin/mobile/create') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create New Mobile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/mobile" class="nav-link {{request()->is('admin/mobile') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All & Search</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/export-excel/excel/mobile" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Export Excel</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{request()->is('admin/user_admin*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/user_admin*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Manage Account
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/user_admin/create" class="nav-link {{request()->is('admin/user_admin/create') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create account</p>
                        </a>
                    </li>
                    <li class="nav-item">
                            <a href="/admin/user_admin" class="nav-link {{request()->is('admin/user_admin') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All & Search</p>
                            </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{request()->is('admin/orders*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/orders*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>Manage Order
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        {{--                        <a href="/client/page/user" class="nav-link"></a>--}}
                        <a href="/admin/orders" class="nav-link {{request()->is('admin/orders') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All & Search</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/export-excel/excel/order" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Export Excel</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{request()->is('admin/order-detail*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/order-detail*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-box-open"></i>
                    <p>
                        Manage Order Detail
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/order-detail" class="nav-link {{request()->is('admin/order-detail') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All & Search</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{request()->is('admin/article*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/article*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Manage Article
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/article/create" class="nav-link {{request()->is('admin/article/create') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create New Article</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/article" class="nav-link {{request()->is('admin/article') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All & Search</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{request()->is('admin/feedback*') ? 'menu-open menu-is-opening' : ''}}">
                <a href="#" class="nav-link {{request()->is('admin/feedback*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>
                        Manage Feedback
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/feedback" class="nav-link {{request()->is('admin/feedback') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show All & Search</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
