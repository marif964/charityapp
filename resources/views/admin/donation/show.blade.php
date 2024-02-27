@extends('layouts.admin-app')

@section('title')
  <title>Donations</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Projects Donation</h1>
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
                                                <th>Project:</th>
                                                <th colspan="2">{{ ucwords($donations[0]->project->title) }}</th>
                                                <th>Goal:</th>
                                                <th colspan="2">{{  $donations[0]->project->goal }}</th>

                                                <th>Total Donations:</th>
                                                @php($fund = $donations->sum('donated'))
                                                <th >{{  number_format($fund, 2) }}</th>
                                            </tr>

                                            <tr>
                                                <th>#</th>
                                                <th>Doner</th>
                                                <th colspan="2">Email</th>
                                                <th>Donated</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($donations as $k => $donation)
                                              <tr>
                                                  <td>{{ ++$k }}</td>
                                                  <td>{{ ucwords($donation->donor) }}</td>
                                                  <td colspan="2">{{ $donation->email }}</td>
                                                  <td>{{ $donation->donated }}</td>
                                                  <td>{{ human_date($donation->created_at) }}</td>
                                                  <td><span class="badge badge-primary pb-2">{{ $donation->status }}</span></td>
                                                  <td class="text-center">
                                                    <div>
                                                        <a class="btn btn-link p-0 ms-1" title="Delete" href="{{ route('admin.delete-donation', ['id'=>$donation->id]) }}">
                                                                <span class="text-danger fas fa-trash-alt"></span> 
                                                            </a>
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