@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style type="text/css">
   .all-projects img{
        height: 250px !important
    }
   
</style>
@endsection

@section('content')

  <div class="container-fluid">

      <div class="row" style="margin-top: 7rem!important;">
        <h2 class="text-muted text-center p-5">All Projects </h2>
       </div> 
      <div class="row">
        @foreach($projects as $project)
          <div class="col-md-10 offset-md-1">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col-md-4 d-none d-lg-block all-projects">
               <a href="{{ route('project-detail', ['project_id'=>$project->id]) }}">
                @if(sizeof($project->images) > 0)

                 @php($img = $project->images[0]->image)
                
                 <img src="{{ asset('assets/uploads/project/'. $img) }}" class="d-block w-100">
                @else
                  <img src="{{ asset('assets/images/slider-placeholder.png') }}" class="d-block w-100" alt="...">
                @endif

              </a>   

              </div>

              <div class="col-md-8 p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">{{ ucwords($project->category->name) }}</strong>
                <a href="{{ route('project-detail', ['project_id'=>$project->id]) }}"><h3 class="mb-0">{{ ucwords($project->title) }}</h3></a>
                <div class="mb-1 text-muted">By: {{ ucwords($project->user->fname).' '.ucwords($project->user->lname) }}</div>
                <p class="mb-auto text-muted">{{ substr(strip_tags(ucfirst($project->description)), 0, 300) }}
                  @if (strlen(strip_tags($project->description)) > 300)
              ... <a href="{{ route('project-detail', ['project_id'=>$project->id]) }}" class="btn btn-link text-primary">Read More</a>
            @endif</p>
                
                <div class="row">
                   <div class="col-md-8">
                       
                @php($donations = $project->donations()->sum('donated'))
                @php($donated = round(($donations / $project->goal * 100), 2))
                @php( $color = $donated > 70? 'success': ($donated > 50 ?'info': ($donated > 50?'primary': ($donated > 20?'secondary': ($donated > 10? 'warning':'danger')))))
                      
                      
                    <div class="mb-0 text-muted">
                      <strong class="text-warning">RS {{$project->donations()->sum('donated')}}</strong> raised of RS {{$project->goal}} goal
                    </div>
                     <div class="progress">                    
                        <div class="progress-bar" role="progressbar" style="width: {{ $donated != 0 ?$donated : 0.5}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $donated }}%</div>
                      </div>
                   </div>
                   <div class="col-md-4">
                     <div class="input-group">
                      <span class="input-group-text">RS</span>
                      <input class="form-control" id="donate" type="number" placeholder="100" name="donate">
                      <a class="btn btn-outline-warning" href="{{ route('checkout-billing', ['id'=>$project->id ]) }}">Donate</a>
                    </div>
                   </div>
                </div>
              </div>
              
            </div>
          </div>
        @endforeach  
      </div>

  </div>
@endsection