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
                <a href="{{ route('admin.create-category') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> New Category</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $k => $category)    
                                            <tr>
                                              <td>{{ $category->name }}</td>
                                              <td>{{ $category->description }}</td>
                                              <td><span class="pb-2 badge badge-{{ $category->status == 'in-active'? 'danger': 'success' }}"> {{  ucwords(str_replace("-", " ", $category->status)) }}</td>
                                              <td class="text-center">
                                                <div>
                                                    <a class="btn btn-link p-0" title="Edit" href="{{ route('admin.edit-category', ['id'=> $category->id]) }}">
                                                        <span class="text-primary fas fa-edit"></span></a>
                                                        <a class="btn btn-link p-0 ms-1" title="Delete" href="#">
                                                            <span class="text-danger fas fa-trash-alt"></span> 
                                                        </a>
                                                </div>
                                              </td>
                                            </tr>

                                            @endforeach
                                           
                                          </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

@endsection


@section('scripts')
   
@endsection