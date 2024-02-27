@extends('layouts.user-app')

@section('title')
  <title>Project Detail</title>
@endsection


@section('styles')
   <link href="{{ asset('admin/assets/vendor/glightbox/glightbox.min.css') }}" rel="stylesheet">
   <link href="{{ asset('admin/assets/vendor/prism/prism-okaidia.css') }}" rel="stylesheet">
@endsection


@section('content')

        @include('partial.user-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Project Detail</h1>
                <a href="{{ route('projects') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table class="table table-striped">
                                        
                                        <tbody>
                                            <tr>
                                                <th>Title</th>
                                                <td>{{ $project->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Category</th>
                                                <td>{{ $project->category->name }}</td>
                                            </tr>
                                            <tr> 
                                                <th>Description</th>
                                                <td>{{ $project->description }}</td>
                                            </tr>

                                            <tr> 
                                                <th>Summary</th>
                                                <td>{{ $project->summary }}</td>
                                            </tr>

                                            <tr> 
                                                <th>Goal</th>
                                                <td>{{ $project->goal }}</td>
                                            </tr>
                                            <tr>
                                                <th>Donation Usage</th>
                                                <td>{{ $project->donation_usage }}</td>
                                            </tr>
                                            <tr>
                                                <th>URL</th>
                                                <td>{{ $project->url ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Challenge</th>
                                                <td>{{ $project->challenge ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <th>Solution</th>
                                                <td>{{ $project->solution ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Announced</th>
                                                <td>{{ human_date($project->created_at) }}</td>
                                            </tr>

                                            <tr>
                                                <th>Ranked</th>
                                                <td>{{$project->ranked }}</td>
                                            </tr>

                                            <tr>
                                                <th>Status</th>
                                                <td><span class="badge bg-{{ $project->status == 'pending'? 'info' : 'success' }} pb-2">{{ $project->status }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Images</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="row mx-n1">
                              @foreach($project->images as $k => $img)  

                                <div class="col-1 p-1">
                                  <a class="post1" href="{{ asset('assets/uploads/project/'.$img->image) }}" data-gallery="gallery-1">
                                    <img class="img-fluid rounded" src="{{ asset('assets/uploads/project/'.$img->image) }}" alt="" />
                                  </a>
                                </div>

                              @endforeach  
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

@endsection


@section('scripts')
   <script src="{{ asset('admin/assets/vendor/glightbox/glightbox.min.js') }}"> </script>
   <script src="{{ asset('admin/assets/vendor/prism/prism.js') }}"></script>
   <script src="{{ asset('admin/assets/vendor/lodash/lodash.min.js') }}"></script>
@endsection