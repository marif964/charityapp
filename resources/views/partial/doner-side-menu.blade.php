       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('doner.home') }}">
                <div class="sidebar-brand-text mx-3">Chairty App</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('doner/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('doner.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ Request::is('doner/my-donation') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('doner.my-donation') }}">
                    <i class="fas fa-fw fa-donate"></i>
                    <span>My Donations</span></a>
            </li>

            <!-- Nav Item - Projects -->
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>