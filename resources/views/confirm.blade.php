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
        <div class="col-md-8 offset-md-2 pe-0">
            <h2 class="text-muted text-center">Donate to {{ ucwords($project->title) }}</h2>
            <p class="text-muted text-center">{{ ucfirst($project->description) }}</p>
        </div>
    </div>

    <div class="row">
    
    <div class="col-md-6 offset-md-4">
      <h4 class="text-warning">Your Dontion: Rs {{  $donated->donated }}</h4>
      <img src="{{ asset('images/telenor-logo.png') }}" class="d-block w-80">
    </div>

  </div>  

  <div class="row">
    
    <div class="col-md-6 offset-md-4">
      <h4 class="mb-3">Please confirm your Donation to proceed</h4>
      <!--<form action="https://easypay.easypaisa.com.pk/easypay/Confirm.jsf" method="post" id="myCCForm">-->
      <form action="https://easypaystg.easypaisa.com.pk/easypay/Confirm.jsf" method="post" id="myCCForm">
        
        <input name="postBackURL" value="{{ $POST_BACK_URL2 }}" type="hidden" />
        <input name="auth_token" value="{{ $auth_token }}" type="hidden" />

        <hr class="mb-4">
        <a class="btn btn-warning btn-lg btn-block float-start" href="{{ route('frontend') }}">Cancel</a>
        <button type="submit" class="btn btn-success btn-lg btn-block float-end" >Confirm</button>
      </form>
    </div>
  </div>   

</div>
@endsection