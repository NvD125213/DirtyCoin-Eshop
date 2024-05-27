<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ngô Văn Đức</a>
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
          <!--Danh mục -->
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý danh mục 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tshirt"></i>
              <p>
                Quản lý sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('slider.index')}}" class="nav-link">
              <i class="nav-icon fa fa-list-ul"></i>
              <p>
                Quản lý slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('settingIndex')}}" class="nav-link">
              <i class="nav-icon fa fa-cog" aria-hidden="true"></i>
              <p>
                Quản lý setting
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('indexAdmin')}}" class="nav-link">
              <i class="nav-icon fa fa-cog" aria-hidden="true"></i>
              <p>
                Quản lý đơn hàng
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
</aside>