<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../../" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="page.php?mod=dashboard" class="brand-link">
    <img src="../../page/Logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1; background-color : white;">
    <span class="brand-text font-weight-light">Warung Murtini</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../src/admin/img/boxed-bg.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="page.php?mod=dashboard" class="d-block">Admin</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="page.php?mod=dashboard" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="page.php?mod=makanan" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Makanan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="page.php?mod=minuman" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Minuman
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="page.php?mod=paketan" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Paketan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="page.php?mod=marimakan" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Mari makan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="page.php?mod=ulasan" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Ulasan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="page.php?mod=lokasi" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Lokasi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="page.php?mod=about" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              About
            </p>
          </a>
        </li>
        <li class="nav-item">
      <a href="login_admin/proses/logout.php" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>