       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
                <div class="sidebar-brand-text mx-3">Chairty App</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.user-list') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

            <!-- Nav Item - Projects -->
            <li class="nav-item {{ Request::is('admin/projects') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.project-list') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Projects</span></a>
            </li>

            <li class="nav-item {{ Request::is('admin/category') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.category-list') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Category</span></a>
            </li>

            <!-- Nav Item - Projects -->
            <li class="nav-item {{ Request::is('admin/donations') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.donations') }}">
                    <i class="fas fa-fw fa-donate" aria-hidden="true"></i>
                    <span>Donations</span></a>
            </li>
             
            <li class="nav-item {{ Request::is('organization') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.organization') }}">
                    <i class="fas fa-fw fa-home" aria-hidden="true"></i>
                    <span>Organization</span></a>
            </li>
            
            <li class="nav-item {{ Request::is('admin/module') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.module-list') }}">
                    <i class="fas fa-fw fa-table" aria-hidden="true"></i>
                    <span>Modules</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>