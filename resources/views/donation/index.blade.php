@extends('layouts.user-app')

@section('title')
  <title>Donations</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.user-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Projects Donation</h1>
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
                                                <th>Donor</th>
                                                <th>Goal</th>
                                                <th>Donated</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
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