<!-- Vertical Navbar -->
<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 py-lg-0 navbar-light bg-light border-end-lg" id="navbarVertical">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand py-lg-5 mb-lg-5 px-lg-6 py-md-6  me-0" href="#">
            <img src="{{ asset('img/logoAN.png') }}" alt="..." width="225" height="auto">
        </a>
        <!-- User menu (mobile) -->
        <div class="navbar-user d-lg-none">
            <!-- Dropdown -->
            <div class="dropdown">
                <!-- Toggle -->
                <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar bg-warning rounded-circle text-white">
                        <img alt="..." src="">
                    </div>
                </a>
                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-item">
                        <span class="d-block text-sm text-muted mb-1">Signed in as</span>
                        <span class="d-block text-heading font-semibold">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="bi bi-house-fill"></i> Beranda
                    </a>
                </li>

                <hr class="navbar-divider my-1 opacity-80">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="bi bi-house-gear-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/news*') ? 'active' : '' }}" href="/dashboard/news">
                        <i class="bi bi-postcard"></i>News
                    </a>
                </li>
            </ul>

            @can('periset')
                <hr class="navbar-divider my-5 opacity-100">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Periset</span>
                </h6>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/publikasi*') ? 'active' : '' }}" href="/dashboard/publikasi">
                            <i class="bi bi-grid"></i>Publikasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/produk*') ? 'active' : '' }}" href="/dashboard/produk">
                            <i class="bi bi-grid"></i>Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/projek*') ? 'active' : '' }}" href="/dashboard/projek">
                            <i class="bi bi-grid"></i>Projek
                        </a>
                    </li>
                </ul>
            @endcan
            @can('admin')
                <hr class="navbar-divider my-5 opacity-100">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Administrator</span>
                </h6>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
                            <i class="bi bi-person-lines-fill"></i>Users
                        </a>
                    </li>

                </ul>
            @endcan

            <div class="mt-auto"></div>
            <!-- Divider -->
            <hr class="navbar-divider my-5 opacity-100">
            <!-- User (md) -->
            <ul class="navbar-nav mb-5">
                <li class="nav-item nav-link">
                    <button type="submit" class="btn btn-outline-primary rounded-1 btn-sm">
                        <i class="bi bi-person-square"></i> Account
                    </button>
                </li>
                <li class="nav-item">
                    <form method="post" action="/logout" class="nav-link">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger rounded-1 btn-sm">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
