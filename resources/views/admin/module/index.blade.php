@extends('layouts.admin-app')

@section('title')
  <title>Modules</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Modules</h1>
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
                                                <th>Heading</th>
                                                <th>Title</th>
                                                <th>Image/ Icon</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($modules as $k => $module)    
                                            <tr>
                                              <td>{{ $module->heading }}</td>
                                              <td>{{ $module->title }}</td>
                                              <td><img src="{{ asset('assets/uploads/module/'.$module->image) }}"  style="width: 100px; height: 50px;"></td>
                                              <td><textarea class="form-control">{{ $module->description }}</textarea></td>
                                              <td><span class="pb-2 badge badge-{{ $module->status == 'in-active'? 'danger': 'success' }}"> {{  ucwords(str_replace("-", " ", $module->status)) }}</td>

                                              <td class="text-center">
                                                <div>
                                                    <a class="btn btn-link p-0" title="Edit" href="{{ route('admin.edit-module', ['id'=> $module->id]) }}">
                                                        <span class="text-primary fas fa-edit"></span></a>
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