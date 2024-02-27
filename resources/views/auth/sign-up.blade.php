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
                                        <h1 class="h4 text-gray-900 mb-4">Sign Up</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('register') }}">
                                    	@csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('fname') is-invalid @enderror" id="fname" name="fname" aria-describedby="fnameHelp" value="{{old('fname')}}" placeholder="First name">
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('lname') is-invalid @enderror" id="lname" name="lname" aria-describedby="lnameHelp" value="{{old('lname')}}" placeholder="Last name">
                                             @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{old('email')}}" placeholder="email">
                                        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="pass"  name="password" placeholder="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password_confirmation"  name="password_confirmation" placeholder="confirm password">
                                        </div>

                                        
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
					                        SignUp
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