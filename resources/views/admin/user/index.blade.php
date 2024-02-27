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
                <h1 class="h3 mb-0 text-gray-800">Users</h1>
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
                                                <th>Email</th>
                                                <th class="text-center">Projects</th>
                                                <th class="text-center">Pending</th>
                                                <th class="text-center">Approved</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $k => $user)    
                                            <tr>
                                              <td>{{ $user->fname.' '.$user->lname }}</td>
                                              <td>{{ $user->email }}</td>
                                              <td class="text-center"><span class="badge badge-secondary">{{ $user->projects()->count() }}</span></td>
                                              <td class="text-center"><span class="badge badge-warning">{{ $user->projects()->where('status', 'pending')->count() }}</span></td>
                                              <td class="text-center"><span class="badge badge-success">{{ $user->projects()->where('status', 'approved')->count() }}</span></td>
                                              <td class="text-center">
                                                <div>
                                                    <a class="btn btn-link p-0" title="View Projects" href="{{ route('admin.view-user-project', ['id'=> $user->id]) }}">
                                                        <span class="text-info fas fa-eye"></span></a>
                                                   
                                                        <a class="btn btn-link p-0 ms-1" title="Delete" href="{{ route('admin.delete-user', ['id'=> $user->id]) }}" onclick="return confirm('Are you sure you want to delete this User & it\'s Project?');">
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