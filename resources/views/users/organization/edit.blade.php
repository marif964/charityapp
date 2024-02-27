@extends('layouts.user-app')

@section('title')
  <title>Edit Organization</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.user-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Organization</h1>
                <a href="{{ route('home') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                        class="fas fa-window-close fa-sm text-white-50"></i> Cancel</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{ route('update-our-organization') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                         <div class="mb-3"><label class="form-label" for="designation">Designation</label><input class="form-control" id="designation" type="text" name="designation" value="{{ $organization->designation }}"></div>   
                                    </div>
                                    
                                    <div class="col-md-3">
                                         <div class="mb-3"><label class="form-label" for="contact_no">Contact No</label><input class="form-control" id="contact_no" type="text" name="contact_no" value="{{ $organization->contact_no }}"></div>   
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3"><label class="form-label" for="address">Address</label><input class="form-control" id="address" type="text"  name="address" value="{{ $organization->address }}"></div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label" for="reg-certificate">Reg Certificate</label>
                                            <input class="form-control" id="reg-certificate" type="file" name="reg_certificate"></div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label" for="auditreport">Audit Report</label>
                                            <input class="form-control" id="auditreport" type="file" name="audit_report">
                                        </div>
                                    </div>

                                    <div class="col-md-2 mt-4">
                                        <div class="mb-0  float-end">
                                            <input type="hidden" name="id" value="{{ $organization->id }}">
                                            <button class="btn btn-success me-1 mb-0 mt-1" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

@endsection


@section('scripts')
   
@endsection