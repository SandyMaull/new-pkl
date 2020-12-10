<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo --> --}}
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    {{-- <!-- Sidebar --> --}}
    <div class="sidebar">
        {{-- <!-- Sidebar user panel (optional) --> --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        {{-- <!-- Sidebar Menu --> --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/administrator') }}" class="nav-link" id="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview" id="admin_tab">
                    <a href="#" class="nav-link" id="admin_module">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Admin Module
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link" id="banner">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banner</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('/administrator/kategori') }}" class="nav-link" id="kategori">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/administrator/produk') }}" class="nav-link" id="produk">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link" id="gam_prod">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gambar Produk</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
