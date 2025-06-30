<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('backend.home') }}"
                class="nav-link {{ request()->is('backend/home') || request()->is('backend/home/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                    <span class="right badge badge-danger">+1</span>
                </p>
            </a>
        </li>
        <li
            class="nav-item {{ request()->is('backend/products/*') || request()->is('backend/products') ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('backend/products/*') || request()->is('backend/products') ? 'active' : '' }}">
                <i class="fa fa-asterisk nav-icon" aria-hidden="true"></i>
                <p>
                    Products
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('backend.products.index') }}"
                        class="nav-link {{ request()->is('backend/products') || request()->is('backend/products/*') ? 'active' : '' }}">
                        <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                        <p>List Product</p>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="nav-item {{ request()->is('backend/roles/*') ||
            request()->is('backend/roles') ||
            request()->is('backend/permissions') ||
            request()->is('backend/permissions/*') ||
            request()->is('backend/users') ||
            request()->is('backend/users/*')
                ? 'menu-open'
                : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('backend/roles/*') ||
                request()->is('backend/roles') ||
                request()->is('backend/permissions') ||
                request()->is('backend/permissions/*') ||
                request()->is('backend/users') ||
                request()->is('backend/users/*')
                    ? 'active'
                    : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Users Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('backend.permissions.index') }}"
                        class="nav-link {{ request()->is('backend/permissions') || request()->is('backend/permissions/*') ? 'active' : '' }}">
                        <i class="far fas fa-unlock-alt nav-icon"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.roles.index') }}"
                        class="nav-link {{ request()->is('backend/roles') || request()->is('backend/roles/*') ? 'active' : '' }}">
                        <i class="far fas fa-briefcase nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.users.index') }}"
                        class="nav-link {{ request()->is('backend/users') || request()->is('backend/users/*') ? 'active' : '' }}">
                        <i class="far fas fa-user nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>
