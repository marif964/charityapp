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
    
    .btn-donate{
        display: none;
    }
   
</style>

@endsection

@section('content')

<div class="container-fluid">

    <div class="row" style="margin-top: 7rem!important;">
        <div class="col-md-6 pe-0">
            <div id="lgcarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#lgcarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#lgcarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#lgcarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                
                @php($rankOneProjects = getProjectsByRank(1))

                @if(sizeof($rankOneProjects) > 0)

                @foreach($rankOneProjects as $k => $rankOneProj)
           
                @php($id = Crypt::encrypt($rankOneProj->id))
                
                @if($rankOneProj->images->count() > 0)
                @php($img = $rankOneProj->images[0]->image)
                @else
                  @php($img ='')
                @endif
                
                

                <a href="{{ route('project-detail', ['project_id' => $id]) }}">
                  <div class="carousel-item {{ $k == 0 ?'active' :''}}">
                    
                      @if($img != '')
                         <img src="{{ asset('assets/uploads/project/'.$img) }}" class="d-block w-100" alt="...">
                      @else
                         
                         <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                      @endif
                    <div class="carousel-caption d-none d-md-block">
                      <h2 class="text-white">{{ ucwords($rankOneProj->title) }}</h2>
                      @if(!Auth::guard('web')->check())
                        @php($donations = $rankOneProj->donations->sum('donated'))
                        @if($donations != $rankOneProj->goal)
                        
                      <a href="{{ route('project-detail', ['project_id' => $id]) }}" class="btn btn-warning btn-block btn-donate">Donate</a>
                      @endif
                      @endif
                    </div>
                  </div>
                </a>

                @endforeach

                @else
                    <a href="javaScript:void(0)">
                        <div class="carousel-item active">
                          <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                             <p class="text-white">Not Available Rank 1 Projects</p>
                          </div>
                       </div>
                    </a>
                @endif  
                
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
        <div class="col-md-6 px-1">
           <div class="row">
              <div class="col-md-6 pe-0 pb-1">
                 <div id="mdOneCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                       <button type="button" data-bs-target="#mdOneCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                       <button type="button" data-bs-target="#mdOneCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                       <button type="button" data-bs-target="#mdOneCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">

                    @php($rankTwoProjects = getProjectsByRank(2))
                        
                    @if(sizeof($rankTwoProjects) > 0)

                        @foreach($rankTwoProjects as $k => $rankTwoProj)
                        
                        @php($id = Crypt::encrypt($rankTwoProj->id))
                        
                        @if($rankTwoProj->images->count() > 0)   
                        @php($img = $rankTwoProj->images[0]->image)
                        @else
                          @php($img ='')
                        @endif
                        
                    <a href="{{ route('project-detail', ['project_id' => $id]) }}">
                        <div class="carousel-item {{ $k == 0 ?'active' :''}}">
                          
                            @if($img != '')
                               <img src="{{ asset('assets/uploads/project/'.$img) }}" class="d-block w-100" alt="...">
                            @else
                               
                               <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                            @endif
                          <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">{{ ucwords($rankTwoProj->title) }}</h5>
                            @if(!Auth::guard('web')->check())
                              @php($donations = $rankTwoProj->donations->sum('donated'))
                              @if($donations != $rankTwoProj->goal)
                              
                            <a href="{{ route('project-detail', ['project_id' => $id]) }}" class="btn btn-warning btn-block btn-donate">Donate</a>
                            @endif
                      @endif
                          </div>
                        </div>
                    </a>    

                        @endforeach
                    @else

                        <div class="carousel-item active">
                          <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                             
                             <p class="text-white">Not Available Rank 2 Projects</p>
                          </div>
                       </div>
                    @endif   
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mdOneCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mdOneCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                 </div>
              </div>
              <div class="col-md-6 px-1 pb-1">
                 <div id="mdTwocarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                       <button type="button" data-bs-target="#mdTwocarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                       <button type="button" data-bs-target="#mdTwocarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                       <button type="button" data-bs-target="#mdTwocarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                       <@php($rankThreeProjects = getProjectsByRank(3))
                        
                    @if(sizeof($rankThreeProjects) > 0)

                        @foreach($rankThreeProjects as $k => $rankThreeProj)
                        
                        @php($id = Crypt::encrypt($rankThreeProj->id))
                        
                        @if($rankThreeProj->images->count() > 0) 
                        @php($img = $rankThreeProj->images[0]->image)
                        @else
                          @php($img ='')
                        @endif
                        
                    <a href="{{ route('project-detail', ['project_id' => $id]) }}">
                        <div class="carousel-item {{ $k == 0 ?'active' :''}}">
                          
                            @if($img != '')
                               <img src="{{ asset('assets/uploads/project/'.$img) }}" class="d-block w-100" alt="...">
                            @else
                               
                               <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                            @endif
                          <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">{{ ucwords($rankThreeProj->title) }}</h5>
                            @if(!Auth::guard('web')->check())
                              @php($donations = $rankThreeProj->donations->sum('donated'))
                              @if($donations != $rankThreeProj->goal)
                              
                            <a href="{{ route('project-detail', ['project_id' => $id]) }}" class="btn btn-warning btn-block btn-donate">Donate</a>
                            @endif
                           @endif
                          </div>
                        </div>
                    </a>

                        @endforeach
                    @else

                        <div class="carousel-item active">
                          <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                             
                             <p class="text-white">Not Available Rank 3 Projects</p>
                          </div>
                       </div>
                    @endif  
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mdTwocarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mdTwocarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-6 pe-0 pb-1">
                 <div id="mdThreeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                       <button type="button" data-bs-target="#mdThreeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                       <button type="button" data-bs-target="#mdThreeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                       <button type="button" data-bs-target="#mdThreeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                       @php($rankFourProjects = getProjectsByRank(4))
                        
                    @if(sizeof($rankFourProjects) > 0)

                        @foreach($rankFourProjects as $k => $rankFourProj)
                        
                        @php($id = Crypt::encrypt($rankFourProj->id))
                        
                        @if($rankFourProj->images->count() > 0)
                        @php($img = $rankFourProj->images[0]->image)
                        @else
                          @php($img ='')
                        @endif
                        
                        <a href="{{ route('project-detail', ['project_id' => $id]) }}">
                        <div class="carousel-item {{ $k == 0 ?'active' :''}}">
                          
                            @if($img != '')
                               <img src="{{ asset('assets/uploads/project/'.$img) }}" class="d-block w-100" alt="...">
                            @else
                               
                               <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                            @endif
                          <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">{{ ucwords($rankFourProj->title) }}</h5>
                             @if(!Auth::guard('web')->check())
                              @php($donations = $rankFourProj->donations->sum('donated'))
                              @if($donations != $rankFourProj->goal)
                              
                            <a href="{{ route('project-detail', ['project_id' => $id]) }}" class="btn btn-warning btn-block btn-donate">Donate</a>
                            @endif
                           @endif
                          </div>
                        </div>
                        
                        </a>

                        @endforeach
                    @else

                        <div class="carousel-item active">
                          <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                             
                             <p class="text-white">Not Available Rank 4 Projects</p>
                          </div>
                       </div>
                    @endif  
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mdThreeCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mdThreeCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                 </div>
              </div>
              <div class="col-md-6 px-1 pb-1">
                 <div id="mdFourCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                       <button type="button" data-bs-target="#mdFourCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                       <button type="button" data-bs-target="#mdFourCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                       <button type="button" data-bs-target="#mdFourCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      @php($rankFiveProjects = getProjectsByRank(5))
                        
                    @if(sizeof($rankFiveProjects) > 0)

                        @foreach($rankFiveProjects as $k => $rankFiveProj)
                        
                        @php($id = Crypt::encrypt($rankFiveProj->id))
                        
                        @if($rankFiveProj->images->count() > 0)    
                        @php($img = $rankFiveProj->images[0]->image)
                        @else
                          @php($img ='')
                        @endif
                        
                        <a href="{{ route('project-detail', ['project_id' => $id]) }}">
                        <div class="carousel-item {{ $k == 0 ?'active' :''}}">
                          
                            @if($img != '')
                               <img src="{{ asset('assets/uploads/project/'.$img) }}" class="d-block w-100" alt="...">
                            @else
                               
                               <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                            @endif
                          <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">{{ ucwords($rankFiveProj->title) }}</h5>
                            @if(!Auth::guard('web')->check())
                              @php($donations = $rankFiveProj->donations->sum('donated'))
                              @if($donations != $rankFiveProj->goal)
                              
                            <a href="{{ route('project-detail', ['project_id' => $id]) }}" class="btn btn-warning btn-block btn-donate">Donate</a>
                            
                            @endif
                           @endif
                          </div>
                        </div>
                        </a>

                        @endforeach
                    @else

                        <div class="carousel-item active">
                          <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                             
                             <p class="text-white">Not Available Rank 5 Projects</p>
                          </div>
                       </div>
                    @endif  
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mdFourCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mdFourCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                 </div>
              </div>
           </div>
        </div>
    </div>

</div>


<!-- <a href="{{ route('login') }}" class="btn btn-warning w-50 w-100 mt-1 text-light fw-bold fs-2x">Add Fundraiser Compaign Data</a> -->
<h6 class="my-3 text-center" style="color: #5b564c; font-size: 15px">EXPLORE PROJECTS:</h6>

<div class="explore_project">
   
   @foreach($categories as $k => $cate)
    @if($cate->projects()->count() > 0)
    
    @php($cid = Crypt::encrypt($cate->id))
    <a href="{{ route('category.wise', ['category'=> $cid]) }}">{{ ucwords($cate->name) }}</a>
    @endif 
   @endforeach
   
   <a href="{{ route('all-projects') }}">{{ ucwords('All Projects') }}</a>
</div>



@endsection
@section('scripts')

<script>
$(document).ready(function(){
	$('.carousel').hover(function(){ 
	    $(this).find('.btn-donate').fadeIn("slow");
	}, function(){
	    
        $(this).find('.btn-donate').fadeOut();
    });
});
</script>

@endsection

