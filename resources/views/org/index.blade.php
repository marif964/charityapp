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
                <h1 class="h3 mb-0 text-gray-800">Organizations</h1>
                
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
                                                <th>Owner</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Contact No</th>
                                                <th>Address</th>
                                                <th>Reg Certificate</th>
                                                <th>Audit Report</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($organizations as $k => $organization)    
                                            <tr>
                                              <td>{{ ucwords($organization->name) }}</td>
                                              <td>{{ ucwords($organization->user->fname.' '.$organization->user->lname) }}</td>
                                              <td>{{ $organization->user->email }}</td>
                                              <td>{{ ucwords($organization->designation) }}</td>
                                              <td>{{ $organization->contact_no }}</td>
                                              <td>{{ $organization->address }}</td>
                                              <td><a href="{{ asset('assets/uploads/org-document/'.$organization->reg_certificate) }}" target="_blank">View Registration Certificate</a></td>
                                              <td><a href="{{ asset('assets/uploads/org-document/'.$organization->audit_report) }}" target="_blank">View Audit Report</a></td>
                                              
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