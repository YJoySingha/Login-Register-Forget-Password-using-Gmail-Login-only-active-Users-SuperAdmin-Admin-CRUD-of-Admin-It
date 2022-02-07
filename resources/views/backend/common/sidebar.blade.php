<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void();" class="brand-link">
      <img src="{{ asset('backend/isset/image/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SRK</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item" >
            <a href="javascript:void();" class="nav-link" style="background:#494e53;">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Operations
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          @if(Auth::user()->role == 'sadmin')

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Super Admin Sections
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/add-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/admin-details" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Details</p>
                </a>
              </li>
            </ul>
          </li>

          @endif

          @if(Auth::user()->role == 'admin')

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                  Admin Items Sections
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/add-items" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Items Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/item-details" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Items Details</p>
                </a>
              </li>
            </ul>
          </li>

          @endif

          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="/admin/profile-admin" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/api-details" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">API Data</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>