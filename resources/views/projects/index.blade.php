@extends('layouts.user-app')

@section('title')
  <title>Dashboard</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.user-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Projects</h1>
                <a href="{{ route('new-project') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> New Project</a>
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
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Goal</th>
                                                <th>Donation Usage</th>
                                                <th>Announced</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($projects as $k => $proj)
                                              
                                              <tr>
                                                <td>{{ $proj->title }}</td>
                                                <td>{{ $proj->category->name ?? '' }}</td>
                                                <td>{{ $proj->description }}</td>
                                                <td>{{ $proj->goal }}</td>
                                                <td>{{ $proj->donation_usage }}</td>
                                                <td>{{ human_date($proj->created_at) }}</td>
                                                <td><span class="badge bg-success pb-2">{{ $proj->status }}</span></td>
                                                <td >
                                                <div>
                                                    <a class="btn btn-link p-0" title="Donation Detail" href="{{ route('view-project-donations', ['id'=> $proj->id]) }}" >
                                                        <span class="text-info fas fa-donate"></span></a>

                                                    <a class="btn btn-link p-0" title="Detail" href="{{ route('view-project', ['id'=> $proj->id]) }}">
                                                        <span class="text-success fas fa-eye"></span></a>
                                                    @if($proj->status != 'approved')     
                                                    <a class="btn btn-link p-0" title="Edit" href="{{ route('edit-project', ['id'=> $proj->id]) }}">
                                                        <span class="text-info fas fa-edit"></span></a>
                                                    @endif    
                                                    <a class="btn btn-link p-0 ms-1" title="Delete" href="{{ route('delete-project', ['id'=> $proj->id]) }}" onclick="return confirm('Are you sure you want to delete this Project?');">
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