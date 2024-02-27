<nav class="navbar p-3 navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom: 1px solid black;">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#"><img src="images/logo.jpg" style="width: 25%;" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="" class="fw-bold explore_project1"
                style="margin-left: -6rem; font-size: 1.5rem; text-decoration: none; color: #1c97e3;">Explore
                Project <i class="fa fa-search" style="color: #1681c4;"></i></a>
            <p class="text-warning mt-3 mx-4 fw-bold">
            </p>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">



                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="{{ route('frontend')}}">Home</a>
                    </li>
                    {{-- <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="#">Learn</a>
                    </li> --}}
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="#">Nonprofit</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="#">Corporate</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link  fw-bold active" style="color: #1c79e3;" aria-current="page"
                            href="{{ route('new-project') }}">Add
                            Project
                        </a>
                    </li>
                    {{-- <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="#"> <i class="fa fa-gift"
                                style="color: #e37f1c;"></i>
                            Gift <i class="fa fa-cart-shopping text-dark"></i> </a>
                    </li> --}}
                    <style>
                    .dropdown a:hover {
                        color: white !important;
                    }
                    </style>

                    @auth
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-success text-light dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                           Profile
                        </button>
                        <ul class="dropdown-menu mt-2" style="margin-left: -10rem; font-size: .9rem;">
                            <li><p class="dropdown-item fw-bold"> <i class="fa fa-user text-dark mx-1"> </i> {{auth()->user()->email}}</p></li>
                            <li><a class="dropdown-item fw-bold" href="{{ route('new-project') }}"><i class="fa fa-edit text-dark mx-1"> </i>Add Project</a></li>
                            <li><a class="dropdown-item fw-bold" href="{{ route('home') }}"><i class="fa fa-edit text-dark mx-1"> </i>Dashboard</a></li>
                            <form method="POST" action="/logout">
                                @csrf
                             {{-- <button type="submit" class="fa fa-sign-out text-dark my-1 mx-1"> --}}
                                
                                <a class="dropdown-item fw-bold" href="/logout"><i class="fa fa-sign-out text-dark my-1 mx-1"> </i>
                                    <button type="hidden">
                                    Logout</button></a>

                                {{-- Logout --}}
                            
                            {{-- </button> --}}
                            </form>
                            {{-- <form class="inline" method="post" action={{ route('logout') }}>
                                @csrf
                            <li><a class="dropdown-item fw-bold" href={{ route('logout') }}><i class="fa fa-sign-out text-dark my-1 mx-1"> </i>Logout</a></li> 
                            </form>  --}}
                             </ul>
                    </div>
                    @else
                        <div class="btn-group">
                            <a href="{{ route('login') }}">
                        <button type="button" class="btn text-light" style="background: #1c79e3"
                             aria-expanded="false">
                             Login
                        </button></a>
                        {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="/signin">By User</a></li>
                         
                        </ul> --}}
                    </div>   
                    @endauth
                </ul>

            </div>
        </div>
    </nav>