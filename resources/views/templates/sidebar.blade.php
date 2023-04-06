<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
        <div class="ml-2 mt-2" title=1"Log Out">
            <a href="{{ url('logout ') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
          <li class="nav-header"><b>MENU</b></li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/catatan') }}" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Paket
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/transaksi') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Outlet
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/absensi') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/cucian') }}" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/laporan') }}" class="nav-link">
              <i class="nav-icon fas fa-bug"></i>
              <p>
                Laporan Bug
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
