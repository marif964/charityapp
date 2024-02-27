<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    {{-- <link rel="stylesheet" href="{{asset('css/home.css')}}" />
    
    <link rel="stylesheet" href="{{asset('css/explore.css')}}" />
    <link rel="stylesheet" href="{{asset('css/donation.css')}}" /> --}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}" />
    
    <title>Chairty</title>
     
    <style>
    #overlay{   
              position: fixed;
              top: 0;
              z-index: 100;
              width: 100%;
              height:100%;
              display: none;
              background: rgba(0,0,0,0.6);
            }
            .cv-spinner {
              height: 100%;
              display: flex;
              justify-content: center;
              align-items: center;  
            }
            .spinner {
              width: 40px;
              height: 40px;
              border: 4px #ddd solid;
              border-top: 4px #2e93e6 solid;
              border-radius: 50%;
              animation: sp-anime 0.8s infinite linear;
            }
            @keyframes sp-anime {
              100% { 
                transform: rotate(360deg); 
              }
            }
            .is-hide{
              display:none;
            }
    html {
        font-size: 90%;
    }
    
    body{
        background-color: #e9ecef !important;
    }
    
    .bg-light {
            background-color: #e9ecef !important;
    }
    .search_box input {
        background-color: white !important;
    }

    .nav-item a:hover {
        color: #e37f1c !important;
    }

    .nav-item a {
        font-size: 1.2rem;
        padding: 10px;
    }

    @media (max-width: 1096px) {
        .explore_project1 {
            display: none;
        }
    }
    </style>
    @yield('styles')
</head>

<body>
    
    <div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
      </div>
    </div>
    <!-- navbar start -->
    @include('partial.navbar')

    <!-- navbar end -->

   

    @yield('content')

   
    @if(Route::current()->getName() !== 'all-projects')

    @if(Route::current()->getName() !== 'project-detail' && Route::current()->getName() !== 'share-project' && 
        Route::current()->getName() !== 'checkout-confirm'  && Route::current()->getName() !== 'checkout-billing' &&
        Route::current()->getName() !== 'about-us')
        @include('partial.how-at-works')
    @endif    
      
        <!-- news  -->
        @include('partial.news')
        

        <!-- signup search btn -->
        @include('partial.signup')
   @endif

    <!-- footer  -->
    @include('partial.footer')

  <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
<script src="{{ asset('assets/js/alerts.js') }}"></script>
 @yield('scripts')
</body>

</html>