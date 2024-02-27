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
                                        <h1 class="h4 text-gray-900 mb-4">Organization Info</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('register-organization') }}">
                                    	@csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="org_name" name="org_name" aria-describedby="org_nameHelp" value="{{old('org_name')}}" placeholder="org.. name">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="contact_no" name="contact_no" aria-describedby="contact_noHelp" value="{{old('contact_no')}}" placeholder="contact no">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="designation" name="designation" aria-describedby="designationHelp" value="{{old('designation')}}" placeholder="owner designation" autocomplete="no">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="address"  name="address" placeholder="address">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
					                        Submit
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