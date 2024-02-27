@extends('layouts.main')
@section('pagespecificstyle')
<link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
<style type="text/css">

</style>

@endsection
@section('content')
    <div class="page-wrapper" style="display: block;">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-5 align-self-center">
                    <h4 class="page-title">Edit Admin</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Administrator</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-7 d-flex justify-content-end align-self-center d-none d-md-flex">
                     
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('super-admin.update-administrator') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-3">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>

                                    <div class="col-md-3">
                                       <select name="role" id="role" class="form-control">
                                           <option value="">--select--</option>
                                           @foreach($roles as $key => $role)
                                           <option value="{{ $role->id }}" {{ $user->userRole->role_id == $role->id ? 'selected=selected': '' }}>{{ $role->name }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                </div>

                                <div class="row mb-3">
                                    <label for="organization" class="col-md-4 col-form-label text-md-end">Organizations</label>

                                    <div class="col-md-3">
                                       <select name="organization" id="organization" class="form-control">
                                           <option value="">--select--</option>
                                           @foreach($organizations as $key => $org)
                                               <option value="{{ $org->id }}" {{ (!is_null($user->organization) && $user->organization->id == $org->id) ? 'selected=selected': '' }}>{{ $org->name.' ('.strtolower($org->country->name).')' }}
                                               </option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-3 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
