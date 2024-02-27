@extends('layouts.admin-app')

@section('title')
  <title>Categories</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Categories</h1>
                <a href="{{ route('admin.category-list') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-list fa-sm text-white-50"></i> Category List</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{ route('admin.add-category') }}" method="post">
                                @csrf
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-4 mr-2">
                                         <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control" id="name" name="name" type="text" placeholder="abc.."></div>   
                                    </div>
                                    <div class="col-md-4 mr-2">
                                        <div class="mb-3"><label class="form-label" for="description">Description</label><input class="form-control" id="description" type="text" placeholder="info.." name="description"></div>
                                    </div>
                                    <div class="col-md-3 mr-2 mt-3">
                                        <div class="mb-0">
                                            <button class="btn btn-success me-1 mb-0" type="submit">Add</button>
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