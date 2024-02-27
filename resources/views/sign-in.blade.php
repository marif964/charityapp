@extends('layouts.admin-login-app')

@section('title')
  
@endsection


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
                                        <h1 class="h4 text-gray-900 mb-4">Choose your account to Sign In </h1>
                                        <div class="text-center mb-4">
                                            <a class="" href="{{ route('frontend') }}"><i class="fas fa-globe fa-sm fa-fw mr-2 text-white-400"></i> Go to main site</a>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="text-center">
                                       <a class="btn btn-primary btn-user btn-block btn-link text-white" href="{{ route('login') }}">Sign In Fundrasier</a>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                       <a class="btn btn-secondary btn-user btn-block btn-link text-white" href="{{ route('doner.login') }}">Sign In Doner</a>
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