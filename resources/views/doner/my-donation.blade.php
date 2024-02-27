@extends('layouts.admin-app')

@section('title')
  <title>Donations</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.doner-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Donations</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Project</th>
                                                <th>Goal</th>
                                                <th>Donated</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($donations as $k => $donation)
                                                @php($donations = $donation->project->donations->sum('donated'))
                                              <tr>
                                                  <td>{{ ucwords($donation->project->title) }}</td>
                                                  <td>{{ $donation->project->goal }}</td>
                                                  <td>{{ $donation->donated }}</td>
                                                  <td>{{ human_date($donation->created_at) }}</td>
                                                  <td><span class="badge badge-primary pb-2">{{ $donation->status }}</span></td>
                                                  <td class="text-left">
                                                    <div>
                                                        
                                                        @if($donations != $donation->project->goal)
                                                        <a class="btn btn-warning btn-block p-0 ms-1" title="give donation" href="{{ route('checkout-billing', ['id'=>$donation->project->id ]) }}">
                                                                <span class="text-success fas fa-donate"></span> Donate Again
                                                            </a>
                                                        @else
                                                         <a class="btn btn-link p-0 ms-1" title="target achieved" href="javaScript:void(0)">
                                                                <span class="text-success fas fa-donate"></span> 
                                                            </a>
                                                        @endif    
                                                    </div>
                                                  </td>
                                              </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

@endsection


@section('scripts')
   
@endsection