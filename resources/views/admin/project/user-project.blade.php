@extends('layouts.admin-app')

@section('title')
  <title>Projects</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">User Projects</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table class="table table-striped">
                                         @php($projUser = $projects[0]->user)
                                        <thead>
                                            <tr>
                                                <th colspan="2">User/ Owner</th>
                                                <th colspan="7">{{ ucwords($projUser->fname.' '.$projUser->lname) }}</th>
                                            </tr>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Goal</th>
                                                <th>Donations</th>
                                                <th>Goal Status</th>
                                                <th>Rank</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $k => $project)
                                           
                                            <tr>
                                              <td>{{ ucwords($project->title) }}</td>
                                              <td>{{ strtolower($project->category->name?? '')  }}</td>
                                              <td>{{ $project->description }}</td>
                                              <td>{{ $project->goal }}</td>
                                              <td>{{ $project->donations->sum('donated') }}</td>
                                              <td><span class="pb-2 badge badge-{{ $project->goal_status == 'not-achived'? 'secondary': ($project->goal_status == 'achived'? 'success': 'danger') }}">{{ $project->goal_status }}</span></td>
                                              <td>{{ $project->ranked }}</td>
                                              <td><span class="pb-2 badge badge-{{ $project->status == 'pending'? 'info': ($project->status == 'approved'? 'success': 'danger') }}">{{ $project->status }}</span></td>
                                              <td >
                                                <div>
                                                   
                                                    <a class="btn btn-link p-0" href="{{ route('admin.project-donations', ['id'=> $project->id]) }}">
                                                        <span class="text-success fas fa-eye"></span></a>

                                                    <a class="btn btn-link p-0" href="{{ route('admin.edit-project', ['id'=> $project->id]) }}">
                                                        <span class="text-info fas fa-edit"></span></a>    
                                                        <a class="btn btn-link p-0 ms-0" href="#">
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