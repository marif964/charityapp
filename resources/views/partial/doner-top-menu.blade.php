
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

 

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend') }}" target="_blank">
                    <i class="fas fa-globe fa-sm fa-fw mr-2 text-white-400"></i>
                    Go to main Site
                </a>
        </li>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="javaScript:void(0)" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ ucwords(auth()->user()->name) }}</span>
                @if(auth()->user()->image != '')
                <img class="img-profile rounded-circle"
                    src="{{ asset('assets/uploads/doner-profile/'.auth()->user()->image) }}">
                @else
                
                <img class="img-profile rounded-circle"
                    src="{{ asset('admin/assets/img/undraw_profile.svg') }}">

                @endif   
                    <!-- undraw_profile.svg -->
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('doner.edit-profile', ['id' => auth()->user()->id]) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('doner.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('doner.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->