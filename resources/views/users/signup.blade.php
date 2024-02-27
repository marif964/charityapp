@extends('layouts.sign-signup-app')

@section('title')
  <title>SignUp</title>
@endsection

@push('styles')

    <style>
    label {
        font-weight: 700;
        font-size: .8rem;
    }

    .form-control {
        font-size: 1.3rem;
    }

    ::placeholder {
        font-size: .8rem;
    }
    </style>

@endpush
   
@section('content')   
    <form method="post" action="/users">
        @csrf
        <div class="modal-body mx-auto mt-4"
            style="width: 30rem; border: 2px solid #b2bb1e; box-shadow: 0 0.5rem 0.6rem rgba(0, 0, 0, 0.4);">
            <h2 class="text-center mb-4 text-decoration-underline" style="color: #b2bb1e;">Registration Form</h2>
            <p class="text-center">
                Already have an account?
                <a href="/signin" class="text-dark fw-bold"> Login</a>
            </p>
            <div class=" gap-2" style="width: 100%">

                <div class="mb-2 w-100">
                    <input type="text" class="form-control" id="loginemail" placeholder="Enter First Name"
                        name="fname" aria-describedby="emailHelp"  value="{{old('fname')}}"/>
                        @error('fname')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                

                <div class="mb-2 w-100">
                    <input type="text" class="form-control" placeholder="Enter Last Name" id="loginemail"
                        name="lname" aria-describedby="emailHelp" value="{{old('lname')}}"/>
                        @error('lname')
                        <p class="bg-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

    
                <div class="mb-2">
                    <input type="email" class="form-control" placeholder="Enter Email Address" id="loginemail" 
                        name="email" aria-describedby="emailHelp" value="{{old('email')}}"/>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                       @enderror
    
                </div>
                
                <div class="mb-2 w-100">
                    <input type="password" minlength="8" class="form-control" placeholder="Enter Password"
                        id="loginpass"  name="password" value="{{old('password')}}"/>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
    
                </div>
                
                <div class="mb-2 w-100">
                    <input type="password" minlength="8" class="form-control" placeholder="Enter Confirm Password"
                        id="loginpass"  name="password_confirmation" value="{{old('password_confirmation')}}"/>
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                
                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" value=""  id="flexCheckChecked" />
                    <label class="form-check-label" for="flexCheckChecked">
                        Subscribe to our Awesome Newsletter
                    </label>
                </div>
                <button type="submit" name="submit" style="background-color: #b2bb1e; border: none"
                    class="btn btn-success w-100 d-flex justify-content-center mx-auto fw-bold">
                    SIGN UP
                </button>
                <p class="text-center mt-3">
                    Your infomation is protected by
                    <span class="fw-bold">Privacy Policy</span>
                </p>
            </div>
    </form>
@endsection