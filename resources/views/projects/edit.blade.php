@extends('layouts.user-app')

@section('title')
  <title>Edit Project</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.user-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit</h1>
                <a href="{{ route('projects') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{ route('update-project', $project->id) }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $project->id }}"> 
                                @csrf
                                <div class="row no-gutters align-items-center">

                                    <div class="col mr-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="category">Category</label>
                                             <select class="form-select" aria-label="" name="category" id="category">
                                                <option value="">-select--</option>
                                                @foreach($categories as $k => $cate)
                                                 <option value="{{ $cate->id }}" {{ $cate->id == $project->category_id ? 'selected=selected': ''}}>{{ $cate->name }}</option>
                                                @endforeach 
                                              </select>   
                                        </div>
                                    </div>


                                    <div class="col mr-2">
                                         <div class="mb-3"><label class="form-label" for="title">Title</label><input class="form-control" value="{{ $project->title }}" id="title" name="title" type="text" placeholder="abc.."></div>   
                                    </div>

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="url">URL (Optional)</label><input class="form-control" value="{{ $project->url }}" id="url" type="text" placeholder="info.." name="url"></div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="description">Description</label><input class="form-control" value="{{ $project->description }}" id="description" type="text" placeholder="info.." name="description"></div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="summary">Summary</label><input class="form-control" value="{{ $project->summary }}" id="summary" type="text" placeholder="info.." name="summary"></div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="challenge">Challenge</label><input class="form-control" value="{{ $project->challenge }}" id="challenge" type="text" placeholder="info.." name="challenge"></div>
                                    </div>
                                </div>

                                <div class="row no-gutters align-items-center">

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="solution">Solution</label><input class="form-control" value="{{ $project->solution }}" id="solution" type="text" placeholder="info.." name="solution"></div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="donation">How Your Donation Will Be Used</label><input class="form-control" value="{{ $project->donation_usage }}" id="donation" type="text" placeholder="info.." name="donation"></div>
                                    </div>

                                     <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="goal">Goal in $ (Optional)</label><input class="form-control" value="{{ $project->goal }}" id="goal" type="number" placeholder="100" name="goal"></div>
                                    </div>
                                </div>
                                
                                <div class="row no-gutters align-items-center">    

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="images">Images</label><input class="form-control" id="images" type="file" placeholder="info.." multiple="" name="images[]"></div>
                                    </div>

                                    <div class="col mr-2 mt-3">
                                        <div class="mb-0">
                                            <button class="btn btn-success me-1 mb-0" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

@endsection


@section('scripts')
   
@endsection