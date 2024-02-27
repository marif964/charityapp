@extends('layouts.app')

@section('additionalStyle')
<link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
<style type="text/css">

</style>

@endsection
@section('body-content')
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" >
        <div class="auth-box p-4 bg-white rounded">
            <div id="loginform">
                <div class="logo">
                    <h3 class="box-title mb-3">Sign In</h3> </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3 form-material" id="loginform" method="POST" action="{{ route('login') }}"> @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Enter Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a> </div>
                            </div>
                            <div class="form-group mb-3 d-flex">
                                <div class="checkbox checkbox-info float-left pt-0 ml-2 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <!--<a href="javascript:void(0)" id="to-recover" class="text-dark ml-auto mb-3"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a> --></div>
                            <div class="form-group text-center">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additionalScript')
 <script type="text/javascript">
   $(document).ready(function(){
       $(document).find('body').addClass('bg-login');
   });
 </script>

@endsection
