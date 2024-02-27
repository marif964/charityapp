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
        <h4 class="text-warning">Dontated: Rs {{ $post_data['amount'] }}</h4>
        <h4 class="mb-3">Pay With</h4>
        <img src="{{ asset('images/telenor-logo.png') }}" class="d-block w-80">
      </div>

    </div>  

    <div class="row">
      
      <div class="col-md-6 offset-md-4">
        
        <!--<form action="https://easypay.easypaisa.com.pk/easypay/Index.jsf" method="POST" id="myCCForm">-->
        <form action="https://easypaystg.easypaisa.com.pk/easypay/Index.jsf" method="POST" id="myCCForm">
        <!--<form action="https://easypaystg.easypaisa.com.pk/easypay-service/rest/v4/initiate-ma-transaction" method="POST" id="myCCForm">-->
            

          <input type="hidden" name="amount" value="<?php echo $post_data['amount'];?>">
          <input type="hidden" name="storeId" value="<?php echo $post_data['storeId'];?>">
          <input type="hidden" name="postBackURL" value="<?php echo $post_data['postBackURL'];?>">
          <input type="hidden" name="orderRefNum" value="<?php echo $post_data['orderRefNum'];?>">
          <input type="hidden" name="expiryDate" value="<?php echo $post_data['expiryDate'];?>">
          <input type="hidden" name="autoRedirect" value="<?php echo $post_data['autoRedirect'];?>">
          <input type="hidden" name="merchantHashedReq" value="<?php echo $post_data['merchantHashedReq'];?>">
          <input type="hidden" name="paymentMethod" value="<?php echo $post_data['paymentMethod'];?>">
          <input type ="hidden" name="mobileNum" value="03466948501">
          
          <hr class="mb-4">
          <a class="btn btn-primary btn-lg btn-block float-start" href="{{ route('checkout-billing', ['id'=>$project->id]) }}">Back</a>
          <button type="submit" id="payBtn" class="btn btn-success btn-lg float-end">Proceed</button>
        </form>
      </div>
    </div>   

  </div>
@endsection