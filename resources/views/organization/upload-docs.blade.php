@extends('layouts.admin-login-app')

@section('title', 'Organization')


@section('styles')
   
@endsection


@section('content')
     
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Upload Organization Documents</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('upload-organization-docs') }}" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="form-group">
                                            <label for="inputEmail">Registration Certificate</label>
                                            <input type="file" class="form-control" id="org_certificate" name="org_certificate" aria-describedby="org_certificateHelp" value="{{old('org_certificate')}}" placeholder="org.. certificate">
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="audit_report">Audit Report</label>
                                            <input type="file" class="form-control" id="audit_report" name="audit_report" aria-describedby="audit_reportHelp" value="{{old('audit_report')}}" placeholder="contact no">
                                            
                                        </div>

                                        <input type="hidden" name="org_id" value="{{ $orgId }}">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
					                        Upload
					                    </button>
                                        
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have a Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection


@section('scripts')
   
@endsection