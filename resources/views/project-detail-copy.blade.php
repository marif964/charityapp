@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style type="text/css">
    #carouselImg .carousel-inner img{
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

   
</style>
@endsection

@section('content')

  <div class="container-fluid">

      <div class="row" style="margin-top: 7rem!important;">
          <div class="col-md-4 offset-md-4">
            <nav aria-label="breadcrumb" class="nav justify-content-center">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="javaScript:void(0)">{{ ucwords($project->category->name) }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void(0)">ProjectId: #000{{ $project->id }}</a></li>
              </ol>
            </nav>
            <h2 class="text-left text-center">{{ ucwords($project->title)  }}</h2>
            <p class="text-muted text-center">By: {{ ucwords($project->user->fname.' '.$project->user->lname) }}</p>
          </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="row col-md-12">
            <div id="carouselImg" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                @if(sizeof($project->images) > 0) 
                @foreach($project->images as $k => $image)
                  <button type="button" data-bs-target="#carouselImg" data-bs-slide-to="{{ $k }}" class="{{ $k == 0 ? 'active': ''}}" {{ $k == 0 ? "aria-current=true": ''}} aria-label="Slide {{ $k }}">
                    <img src="{{ asset('assets/uploads/project/'.$image->image) }}" class="d-block w-100" alt="...">
                  </button>
                @endforeach
                @endif  
                  
                </div>
                <div class="carousel-inner">
                 @if(sizeof($project->images) > 0) 
                 @foreach($project->images as $k => $image) 
                  <div class="carousel-item  {{ $k == 0 ? 'active': ''}}">
                    <img src="{{ asset('assets/uploads/project/'.$image->image) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First slide label</h5>
                      <p>Some representative placeholder content for the first slide.</p>
                    </div>
                  </div>
                   @endforeach  
                 
                 @else
                  <div class="carousel-item active">             
                     <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                     <div class="carousel-caption d-none d-md-block">
                      <h5>First slide label</h5>
                      <p>Some representative placeholder content for the first slide.</p>
                    </div>
                  </div>
                  @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselImg" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselImg" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <nav class="nav nav-pills nav-justified mt-3">
                <a class="nav-link active" aria-current="page" href="{{ route('project-detail',['project_id' => $project->id]) }}">Story</a>
                <a class="nav-link" href="{{ route('project-gallery',['project_id' => $project->id]) }}">Photos</a>
                <a class="nav-link " href="{{ route('share-project',['project_id' => $project->id]) }}">Share</a>
              </nav>
            </div>

            <div class="col-md-12 mt-3">
              <h3>Summary</h3>
              <p class="lead text-muted">
                {{ $project->description }}
              </p>
            </div>

            <div class="col-md-12 mt-3">
              <h3>Challenge</h3>
              <p class="lead text-muted">
                {{ $project->challenge}}
              </p>
            </div>

            <div class="col-md-12 mt-3">
              <h3>Solution</h3>
              <p class="lead text-muted">
                {{ $project->solution}}
              </p>
            </div>

            <div class="col-md-12 mt-3">
              <h3>Additional Documentation</h3>
              <p class="lead text-muted">
                <a href="{{ $project->url}}">{{ $project->url}}</a>
              </p>
            </div>


          </div>


        </div>

        <div class="col-md-4">

          <div class="row">
            <div class="col-md-12">
                 <p class="lead text-muted m-1"><strong class="text-warning">$145,987</strong> raised of $180,000 goal</p>
                <div class="progress m-1">
                  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
                <p class="text-muted p-2"><strong class="float-start">2,973 donations</strong><strong class="float-end">$34,013 to go</strong></p>
            </div>
            <div class="d-grid col-12 mx-auto p-3">
                 <a href="{{ route('checkout-billing', ['id'=>$project->id ]) }}" class="btn btn-warning btn-lg">Donate Now</a>
            </div>
            
            <div class="d-grid col-12 mx-auto p-3">
              <div class="btn-group">
                <a href="#" class="btn btn-info m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16"> <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/> </svg> Share On Twitter</a>
               <a href="#" class="btn btn-primary m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"> <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/> </svg> Share On Facebook</a>
              </div>
            </div>
          </div>
               
        </div>

      </div>  

  </div>
@endsection