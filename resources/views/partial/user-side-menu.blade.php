       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
                <div class="sidebar-brand-text mx-3">Chairty App</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Projects -->
            <li class="nav-item {{ Request::is('projects') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('projects') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Projects</span></a>
            </li>

            <!-- Nav Item - Projects -->
            <li class="nav-item {{ Request::is('donations') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('donations') }}">
                    <i class="fas fa-fw fa-donate" aria-hidden="true"></i>
                    <span>Donations</span></a>
            </li>
            
            <li class="nav-item {{ Request::is('our-organization') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('our-organization') }}">
                    <i class="fas fa-fw fa-home" aria-hidden="true"></i>
                    <span>Our Organization</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>