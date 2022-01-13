<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        {{-- <div class="sidebar-brand-icon rotate-n-15"> --}}
        <div class="sidebar-brand-icon">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Kita</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Kategori
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('kategori') || Request::is('add-kategori')  ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Kategori</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item {{ Request::is('kategori') ? 'active' : '' }}" href="{{ url('kategori') }}">Data Kategori</a>
                <a class="collapse-item {{ Request::is('add-kategori') ? 'active' : '' }}" href="{{ url('add-kategori') }}">Tambah Kategori</a>
            </div>
        </div>
    </li>

    {{-- <hr class="sidebar-heading"> --}}

    <li class="nav-item {{ Request::is('produk') || Request::is('add-produk')  ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Produk</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item {{ Request::is('produk') ? 'active' : '' }}" href="{{ url('produk') }}">Data Produk</a>
                <a class="collapse-item {{ Request::is('add-produk') ? 'active' : '' }}" href="{{ url('add-produk') }}">Tambah Produk</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

</ul>
