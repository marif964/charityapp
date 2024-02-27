@extends('layouts.user-app')

@section('title')
  <title>Our Organization</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.user-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Our Organization</h1>
                
            </div>

            <!-- Content Row -->
            <div class="row">
                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table class="table table-striped">
                                        <tbody>
                                           <tr>
                                                <th>Organization</th>
                                                <td>{{ ucwords($organization->name) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Owner</th>
                                                <td>{{ ucwords($organization->user->fname.' '.$organization->user->lname) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $organization->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Designation</th>
                                                <td>{{ ucwords($organization->designation) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact No</th>
                                                <td>{{ $organization->contact_no }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $organization->address }}</td>
                                            </tr>
                                            <tr>
                                                <th>Reg Certificate</th>
                                                <td><a href="{{ asset('assets/uploads/org-document/'.$organization->reg_certificate) }}" target="_blank">View Registration Certificate</a></td>
                                            </tr>
                                            <tr>
                                                <th>Audit Report</th>
                                                <td><a href="{{ asset('assets/uploads/org-document/'.$organization->audit_report) }}" target="_blank">View Audit Report</a></td>
                                            </tr>
                                            <tr>
                                                <th>Action</th>
                                                <td>
                                                    <div>
                                                        <a class="btn btn-link p-0" title="Edit" href="{{ route('edit-our-organization', ['id'=> $organization->id]) }}">
                                                            <span class="text-primary fas fa-edit"></span></a>
                                                            
                                                    </div>
                                                </td>
                                            </tr>
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