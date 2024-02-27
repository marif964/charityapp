@extends('layouts.sign-signup-app')

@section('title')
  <title>Dashboard</title>
@endsection


@section('styles')
   
@endsection

@section('content')

    <nav class="navbar navbar-expand-lg"
        style=" background-color: #b2bb1e; box-shadow: 0.5rem 0.7rem 0.8rem rgba(0, 0, 0, 0.4);">
        <div class="container-fluid">
            <a class="navbar-brand text-light text-uppercase" style="font-size: 1.5rem; font-weight: bold;"
                href="#">{{auth()->user()->fname}} {{auth()->user()->lname}} </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </div>
    </nav>
   
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="row">

        <div class="col-md-2"
            style="background-color: #b2bb1e; border-radius: 1rem 3rem 3rem 1rem; box-shadow: 0.5rem 0.7rem 0.8rem rgba(0, 0, 0, 0.4);">
            <ul class="sidebar nav flex-column my-4 p-1 " style="color: white;">
                <a href="/users/userdetail" class="nav-link text-light"> <i class=" fa fa-address-book-o"></i> Users
                    Data</a>
                <a href="/projects/orgdetail" class="nav-link text-light"> <i class=" fa fa-address-book-o"></i> Organization details</a>
                <a href="fundraiserData.php" class="nav-link text-light"> <i class=" fa fa-tachometer"></i>
                    Fundraiser Data</a>

                <a href="admin_logout.php" class="nav-link text-light"> <i class=" fa fa-sign-out"></i> Logout</a>

            </ul>
        </div>



        <div class="col-md-10">
            <div class="row container my-4">
                
                <div class="d-grid gap-2 my-4">
                    <h3 class="bg-dark text-light p-3 text-center">List of Users</h3>
                </div>
                <table class="table" style="font-size: 85%;">
                    <thead>
                        <tr>
                            <th scope="col">User_id</th>
                            <th scope="col">First_Name</th>
                            <th scope="col">First_Name</th>
                            <th scope="col">User_Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        
                        <tr>
                            <th scope="row"> {{auth()->user()->id}}</th>
                            <td>{{auth()->user()->fname}}</td>
                            <td>{{auth()->user()->lname}}</td>
                            <td>{{auth()->user()->email}}</td>
                            <td>{{auth()->user()->date}}</td>
                            <td> <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                    </tbody>
                   
                </table>


            </div>
        </div>

@endsection
        
@section('scripts')

    @livewireScripts

@endsection    
