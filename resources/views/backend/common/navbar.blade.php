<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-user-circle">{{ Auth::user()->name }}</i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile') }}" class="dropdown-item dropdown-footer">User Profile</a>
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
    </ul>

  </nav> 