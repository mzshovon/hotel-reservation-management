@php
    $route = Route::current()->getName();
@endphp
<style>
    .nav-item-active-a {
        background-color: #f6f9ff !important;
    }

    .ul-item-li-a-i {
        background-color: #4154f1 !important;
    }

    .ul-item-li-a-span {
        color: #4154f1 !important;
    }
</style>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ in_array($route, ['admin.dashboard']) ? 'nav-item-active-a' : 'collapsed' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link {{ in_array($route, ['admin.usersList']) ? 'nav-item-active-a' : 'collapsed' }}"
                href="{{ route('admin.usersList') }}">
                <i class="bi bi-people"></i>
                <span>User</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link @if (in_array($route, ['system.index'])) nav-item-active-a @else collapsed @endif"
                href="{{ route('admin.activityLogs') }}">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Report</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link @if (in_array($route, ['system.index'])) nav-item-active-a @else collapsed @endif"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-file-pdf-fill"></i>
                <span>Invoice</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link @if (in_array($route, ['admin.roomTypesList','admin.rolesList','admin.editRoles','admin.createRoles','admin.permissionsList'])) nav-item-active-a @else collapsed @endif"
                data-bs-target="#configurations-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Configurations</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="configurations-nav" class="nav-content collapse @if (in_array($route, ['admin.roomTypesList','admin.rolesList','admin.editRoles','admin.createRoles','admin.permissionsList'])) show @endif"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.roomTypesList') }}">
                        <i class="bi bi-circle @if (in_array($route, ['admin.roomTypesList'])) ul-item-li-a-i @endif"></i><span
                            @if (in_array($route, ['admin.roomTypesList'])) class="ul-item-li-a-span" @endif>Room Types</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rolesList') }}">
                        <i class="bi bi-circle @if (in_array($route, ['admin.rolesList','admin.editRoles','admin.createRoles'])) ul-item-li-a-i @endif"></i><span
                            @if (in_array($route, ['admin.rolesList','admin.editRoles','admin.createRoles'])) class="ul-item-li-a-span" @endif>Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.permissionsList') }}">
                        <i class="bi bi-circle @if (in_array($route, ['admin.permissionsList'])) ul-item-li-a-i @endif"></i><span
                            @if (in_array($route, ['admin.permissionsList'])) class="ul-item-li-a-span" @endif>Permissions</span>
                    </a>
                </li>
            </ul>
        </li><!-- End configurations Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
