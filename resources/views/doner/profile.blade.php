@extends('layouts.admin-app')

@section('title')
  <title>Edit Project</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.doner-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
                <a href="{{ route('doner.home') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                        class="far fa-window-close text-warning-50"></i> Cancel</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{ route('doner.update-profile') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $profile->id }}"> 
                                @csrf
                                <div class="row no-gutters align-items-center">

                                    <div class="col mr-2">
                                         <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control" value="{{ $profile->name }}" id="name" name="name" type="text" readonly=""></div>   
                                    </div>

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="current_password">Current Password</label><input class="form-control" id="current_password" type="password" name="current_password"></div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="password">New Password</label><input class="form-control" id="password" type="password" name="password"></div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="password_confirmation">Confirm Password</label><input class="form-control" id="password_confirmation" type="password" name="password_confirmation"></div>
                                    </div>

                                </div>
                                
                                <div class="row no-gutters align-items-center">    

                                    <div class="col mr-2">
                                        <div class="mb-3"><label class="form-label" for="image">Image</label><input class="form-control" id="image" type="file" name="image"></div>
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