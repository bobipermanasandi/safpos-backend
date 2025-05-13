<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Safna POS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">SP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-fire"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ Request::is('users') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('users') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('/users') }}">All User</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('products') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Products</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('products') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('/products') }}">All Product</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
