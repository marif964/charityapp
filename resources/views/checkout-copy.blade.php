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
        <div class="col-md-6 offset-md-2 pe-0">
            <h2 class="text-muted text-center">Donate to {{ ucwords($project->title) }}</h2>
            <p class="text-muted text-center">{{ ucfirst($project->description) }}</p>
        </div>
    </div>

    <div class="row">
    
    <div class="col-md-8 offset-md-2">
      <h4 class="mb-3">Billing address</h4>
      <form  action="{{ route('checkout') }}" method="post" >
        @csrf
        <div class="row">
          
          <input type="hidden" name="project_id" value="{{ $project->id }}" >
          <input type="hidden" name="project_goal" value="{{ $project->goal }}" >
          <input type="hidden" name="project_donations" value="{{ $project->donations()->sum('donated') }}" >

          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" placeholder="" value="" required>
          </div>


          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" placeholder="" value="" required>
            
          </div>

          <div class="col-md-6 mb-3">
          <label for="username">Email</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" name="email" placeholder="email" required>
            
          </div>
        </div>
        
        <div class="col-md-6 mb-3">
          <label for="username">Donate</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">RS</span>
            </div>
            <input type="number" class="form-control" name="donate" value="10" step="5" required="">
            
          </div>
        </div>
        </div>

        
        

        <h4 class="mb-3">Payment Method</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="EasyPaisa" name="paymentMethod" value="easyPaisa" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="EasyPaisa">EasyPaisa</label>
          </div>          
        </div>

        
        
        <div class="d-block my-3">
          <p class="text-muted">Please click the button below and follow the instructions provided to complete your donation.</p>
        </div>
        
        <hr class="mb-4">
        <button class="btn btn-warning btn-lg btn-block" type="submit">Donate</button>
      </form>
    </div>
  </div>   

</div>
@endsection
@section('scripts')

<script type="text/javascript">
  
  $(document).ready(function(){
      
      $(document).find('input[name="donate"]').on({
   
        keyup: function(){
          var project_goal = parseInt($(document).find('input[name="project_goal"]').val());
          var project_donations = parseInt($(document).find('input[name="project_donations"]').val());

          var val = parseInt($(this).val());
          var remaining = (project_goal - project_donations);
          
           if (val > remaining) {
                $(this).val(remaining);
                showWarningToast('your donations is exceeded our goal, required donations are only Rs '+remaining);
           }

           
        },
        click: function(){

          var project_goal = parseInt($(document).find('input[name="project_goal"]').val());
          var project_donations = parseInt($(document).find('input[name="project_donations"]').val());

           var val = parseInt($(this).val());
           var remaining = (project_goal - project_donations);

           if (val > remaining) {
                $(this).val(remaining);
                 showWarningToast('your donations is exceeded our goal, required donations are only Rs '+remaining);
           }
            
        }
       
    });
  })
</script>

@endsection