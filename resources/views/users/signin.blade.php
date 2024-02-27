@extends('layouts.sign-signup-app')

@section('title')
  <title>Login</title>
@endsection


@section('content')
    <div class="container">
        <form method="post" action="/users/authenticate">
            @csrf
            <div class="modal-body mt-5 mx-auto"
                style="width: 30rem; border: 2px solid #b2bb1e; box-shadow: 0 0.5rem 0.6rem rgba(0, 0, 0, 0.4);">
                <h2 class="text-center mb-4 text-decoration-underline" style="color: #b2bb1e;">Login Form</h2>
                <p class="text-center">
                    Create an Account?
                    <a href="/signup" class="text-dark fw-bold"> Signup</a>
                </p>
                <div class=" gap-2" style="width: 100%">


                    <div class="mb-2">
                        <label for="loginemail" class="form-label">Email </label>
                        <input type="email" class="form-control" id="loginemail" name="email"
                            aria-describedby="emailHelp" value="{{old('email')}}"/>
                    </div>

                    <div class="mb-2">
                        <label for="loginpass" class="form-label">Passowrd</label>
                        <input type="password" class="form-control" id="loginpass"  name="password" 
                        value="{{old('password')}}"/>
                    </div>

                    {{-- <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked />
                        <label class="form-check-label" for="flexCheckChecked">
                            Subscribe to our Awesome Newsletter
                        </label>
                    </div> --}}
                    <button type="submit" style="background-color: #b2bb1e; border: none"
                        class="btn btn-success w-100 d-flex justify-content-center mx-auto fw-bold">
                        Login
                    </button>
                    <p class="text-center mt-3">
                        Your infomation is protected by
                        <span class="fw-bold">Privacy Policy</span>
                    </p>
                </div>
        </form>
    </div>
@endsection