@php
    $route = Route::current()->getName();
@endphp
<style>
  .nav-item-active-a{
      background-color: #f6f9ff !important;
  }
  .ul-item-li-a-i{
      background-color: #4154f1 !important;
  }
  .ul-item-li-a-span{
      color: #4154f1 !important;
  }
</style>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if (in_array($route, ['system.index'])) nav-item-active-a @else collapsed @endif"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link @if(in_array($route, ['admin.room-types.index'])) nav-item-active-a @else collapsed @endif" data-bs-target="#configurations-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Configurations</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="configurations-nav" class="nav-content collapse @if(in_array($route, ['admin.room-types.index'])) show @endif" data-bs-parent="#sidebar-nav">
              <li>
                  <a href="{{ route('admin.room-types.index') }}">
                      <i class="bi bi-circle @if(in_array($route, ['admin.room-types.index'])) ul-item-li-a-i @endif"></i><span @if(in_array($route, ['admin.room-types.index'])) class="ul-item-li-a-span" @endif>Room Types</span>
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
