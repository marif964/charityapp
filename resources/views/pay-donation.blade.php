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
      <form  action="{{ route('trans-donation') }}" method="post" class="mb-3" id="form">
        @csrf
        <div class="row">
          
          <input type="hidden" name="project_id" value="{{ $project->id }}" >
          <input type="hidden" name="project_goal" value="{{ $project->goal }}" >
          <input type="hidden" name="project_donations" value="{{ $project->donations()->sum('donated') }}" >
          
          @php($doner = Auth::guard('doner')->user())
          @php($name = explode(" ", $doner->name))

          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control bg-white" name="firstName" placeholder="" value="{{ $name[0] ?? '' }}" required readonly="">
          </div>


          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control bg-white" name="lastName" placeholder="" value="{{ $name[1] ?? '' }}" required readonly="">
            
          </div>

          <div class="col-md-6 mb-3">
          <label for="username">Email</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control bg-white" name="email" placeholder="email" value="{{ $doner->email ?? '' }}" required readonly="">
            
          </div>
        </div>
        
        <div class="col-md-6 mb-3">
          <label for="username">Donate</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">RS</span>
            </div>
            <input type="number" class="form-control" name="donate" value="1" step="1" min="0.50" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required="">
            
          </div>
        </div>
        </div>

        
        

        <h4 class="mb-3">Payment Method</h4>

        <div class="row">
          <div class="col-md-2 mt-4">
              <div class="custom-control custom-radio">
            <input id="EasyPaisa" name="paymentMethod" value="easyPaisa" type="radio" class="custom-control-input" checked="" required="">
            <label class="custom-control-label" for="EasyPaisa">EasyPaisa</label>
          </div> 
          </div>

          <div class="col-md-4 mb-3">
              <label for="number">Enter Your Number: <small>(format: 03121234567)</small></label>
              <input id="number" name="number" type="tel" oninput="this.value = this.value.replace(/\D+/g, '')" maxlength="11" class="form-control" required="">
          </div>

        </div>

        
        
        <div class="d-block my-3">
          <p class="text-muted">Please click the button below and follow the instructions provided to complete your donation.</p>
        </div>
        
        <hr class="mb-4">
        <button class="btn btn-warning btn-lg btn-block btn-submit" type="button">Donate</button>
      </form>
    </div>
  </div>   

</div>
@endsection

@section('scripts')

<script type="text/javascript">


  $(document).ready(function(){
      
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

       $(document).ajaxSend(function() {
          $("#overlay").fadeIn(300);　
        });

       $(document).find('.btn-submit').on('click', function(event){
            event.preventDefault();
            
            var number = $(document).find('input[name="number"]').val();
            var reg = /^[0-9]{11}$/;

            if (!reg.test(number)) {
                  showWarningToast("number format is invalid & required 11 digit, format: 03121234567");
            }else{

                $("body").addClass("loading");

                var project_id = $(document).find('input[name="project_id"]').val();
                var project_goal = $(document).find('input[name="project_goal"]').val();
                var project_donations = $(document).find('input[name="project_donations"]').val();
                var firstName = $(document).find('input[name="firstName"]').val();
                var lastName = $(document).find('input[name="lastName"]').val();
                var email = $(document).find('input[name="email"]').val();
                var donate = $(document).find('input[name="donate"]').val();

                var paymentMethod = $(document).find('input[name="paymentMethod"]').val();

                if (firstName == '' || lastName == '' || email == '' || donate == '' || number == '') {
                  showWarningToast('all field are required.');
                }else{
                 $.ajax({
                      url:'{{route('trans-donation')}}',
                      method:"POST",
                      data: {firstName, lastName, email, donate, number, project_id, project_goal, project_donations, paymentMethod},
                      success:function(data){
                        var obj = JSON.parse(data);
                          console.log(data)
                          
                        // if (data == true) {
                        //     showSuccessToast("Thank you for your donation of this project.");

                        //     setTimeout(function(){
                        //         window.location.replace("{{ route('frontend') }}");
                        //     }, 3000); 

                        //  }else{
                        //     // var respDess = (obj.responseCode == '0014')? obj.responseDesc + ' ON THIS NUMBER' : obj.responseDesc; 
                        //     showWarningToast('something went wrong!');
                        //  }
                          
                         if (obj.responseCode == '0000') {
                            showSuccessToast("Thank you for your donation of this project.");

                            setTimeout(function(){
                                window.location.replace("{{ route('frontend') }}");
                            }, 3000); 

                         }else{
                            var respDess = (obj.responseCode == '0014')? obj.responseDesc + ' ON THIS NUMBER' : obj.responseDesc; 
                            showWarningToast(`${respDess}`);
                         }

                         
                      }
                      // ,complete: function(){
                      //   $("body").removeClass("loading"); 
                      // }
                      
                 }).done(function() {
                    setTimeout(function(){
                      $("#overlay").fadeOut(300);
                    },500);
                  });
                }
            }
          
           

           
       })

       // $(document).on('click', '.btn-submit', function(){

       //  $.ajax({
       //       type:'POST',
       //       url:"{{ route('trans-donation') }}",
       //       data:{'orgId':id},
       //       success:function(data){
                
       //          if (data.response == 200) {

       //              var provinces = data.provinces;
       //              for (var i = 0; i < provinces.length; i++) {
                        
       //                  opt += `<option value="${provinces[i].id}">${provinces[i].name}</option>`;
       //              }
                        
       //          }else{
       //              showWarningToast('province not found.');
       //          }
                    
       //              procodeSelector.html('');
       //              procodeSelector.html(opt);
                    
       //              // $(document).find('#customer').val(customerInfo.name);
               
                
       //       }
       //  }); 

       // });

       

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