@extends('layouts.admin-app')

@section('title')
  <title>Donations</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Donations</h1>
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
                                                <th>Project</th>
                                                <th>Goal</th>
                                                <th>Doner</th>
                                                <th>Email</th>
                                                <th>Donated</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($donations as $k => $donation)
                                              <tr>
                                                  <td>{{ ucwords($donation->project->title) }}</td>
                                                  <td>{{ $donation->project->goal }}</td>
                                                  <td>{{ ucwords($donation->donor) }}</td>
                                                  <td>{{ $donation->email }}</td>
                                                  <td>{{ $donation->donated }}</td>
                                                  <td>{{ human_date($donation->created_at) }}</td>
                                                  <td><span class="badge badge-primary pb-2">{{ $donation->status }}</span></td>
                                                  <td class="text-center">
                                                    <div>
                                                        <a class="btn btn-link p-0 ms-1" title="Delete" href="{{ route('admin.delete-donation', ['id'=>$donation->id]) }}">
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