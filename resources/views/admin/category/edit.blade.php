@extends('layouts.admin-app')

@section('title')
  <title>Edit Category</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
                <a href="{{ route('admin.category-list') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{ route('admin.update-category') }}" method="post">
                                @csrf
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-3 mr-2">
                                         <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control" id="name" type="text" placeholder="abc.." name="name" value="{{ $category->name }}"></div>   
                                    </div>
                                    <div class="col-md-3 mr-2">
                                        <div class="mb-3"><label class="form-label" for="description">Description</label><input class="form-control" id="description" type="text" placeholder="info.." name="description" value="{{ $category->description }}"></div>
                                    </div>

                                    <div class="col-md-3 mr-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="status">Status</label>
                                             <select class="form-select" aria-label="" name="status" id="status">
                                                 <option value="active" {{ $category->status == 'active' ? 'selected=selected': ''}} >Active</option>
                                                <option value="in-active" {{ $category->status == 'in-active' ? 'selected=selected': ''}} >In-Active</option>
                                              </select>   
                                        </div>

                                    </div>
                                    <div class="col-md-2 mr-2 mt-3">
                                        <div class="mb-0">
                                            <input type="hidden" name="id" value="1">
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