@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style type="text/css">
    #lgcarousel img{
        height: 400px !important
    }

    #mdOneCarousel img{
         height: 198px !important
    }
    #mdTwocarousel img{
         height: 198px !important
    }
    #mdThreeCarousel img{
         height: 198px !important
    }
    #mdFourCarousel img{
        height: 198px !important
    }
    .carousel-caption a {
        text-decoration: none !important;
    }
   
</style>
@endsection

@section('content')

<div class="container-fluid">

    <div class="row" style="margin-top: 7rem!important;">
        <div class="col-md-12 pe-0">
            <div id="lgcarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#lgcarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#lgcarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#lgcarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                
                  <div class="carousel-item active">
                      <img src="{{ asset('images/hero_aboutus_lg.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="text-white">About Us</h2>
                    </div>
                  </div>
                </a>
                
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#lgcarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#lgcarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
        </div>
        
    </div>

</div>


<div class="explore_project">
   
   <a href="{{ route('all-projects') }}">{{ ucwords('All Projects') }}</a>
</div>



@endsection