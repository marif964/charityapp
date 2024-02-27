@extends('layouts.user-app')

@section('title')
  <title>Dashboard</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.user-top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Projects</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ userProjects()->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Projects
                                    </div>
                                   
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ userProjects('pending')->count() }}</div>
                                       
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Approved Projects</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ userProjects('approved')->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-12 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div class="card-body">
                        @foreach($projects as $k => $project) 

                            @php($donations = $project->donations()->sum('donated'))
                            @php($donated = round(($donations / $project->goal * 100), 2))
                            @php( $color = $donated > 70? 'success': ($donated > 50 ?'info': ($donated > 50?'primary': ($donated > 20?'secondary': ($donated > 10? 'warning':'danger')))))


                            <h4 class="small font-weight-bold">{{ ucwords($project->title) }}<span
                                    class="float-right">{{ $donated }}%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-{{ $color }}" role="progressbar" style="width: {{ $donated != 0 ?$donated : 0.5}}%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                         @endforeach
                        </div>
                        
                        <div class="card-footer">
                            {{ $projects->links() }}
                        </div>
                    </div>
                   
                </div>

                
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection


@section('scripts')
   
@endsection