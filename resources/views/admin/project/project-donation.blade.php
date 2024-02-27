@extends('layouts.admin-app')

@section('title')
  <title>Project Donations</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Projects</h1>
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
                                                <td>{{ $donations[0]->project->title }}</td>
                                                <th>Goal</th>
                                                <td>{{ $donations[0]->project->goal }}</td>
                                                <th>Donated</th>
                                                <td>00</td>
                                            </tr>
                                            <tr>
                                                <th>Donar</th>
                                                <th>Donated</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($donations as $k => $donation)
                                         
                                            <tr>
                                              <td>{{ $donation->donar }}</td>
                                              <td>{{ $donation->donated }}</td>
                                              <td>{{ human_date($donation->created_at) }}</td>
                                              <td>{{ $donation->status }}</td>
                                              
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