@extends('layouts.admin-app')

@section('title')
  <title>Projects</title>
@endsection


@section('styles')
   <style>
       form {
          width: 125px;
            margin: 0 auto;
            text-align: center;
            /* padding-top: 50px*/
        }
        
        .value-button {
            display: inline-block;
            border: 1px solid #ddd;
            margin: 0px;
            width: 25px;
            height: 39px;
            text-align: center;
            /* vertical-align: middle; */
            padding: 6px 0;
            background: #eee;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        
        .value-button:hover {
          cursor: pointer;
        }
        
        form #decrease {
          margin-right: -4px;
          border-radius: 8px 0 0 8px;
        }
        
        form #increase {
          margin-left: -4px;
          border-radius: 0 8px 8px 0;
        }
        
        form #input-wrap {
          margin: 0px;
          padding: 0px;
        }
        
        input#number {
          text-align: center;
        border: none;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        margin: 0px;
        width: 41px;
        height: 40px;
        }
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
   </style>
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Projects</h1>
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
                                                <th>User/ Owner</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Goal</th>
                                                <th>Donations</th>
                                                <th>Status</th>
                                                <th>Rank</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $k => $project)
                                         @php($projUser = $project->user)    
                                            <tr>
                                              <td>{{ $projUser->fname.' '.$projUser->lname }}</td>
                                              <td>{{ $project->title }}</td>
                                              <td>{{ $project->category->name ?? '' }}</td>
                                              <td>{{ $project->description }}</td>
                                              <td>{{ $project->goal }}</td>
                                              <td>{{ $project->donations()->sum('donated') }}</td>
                                              
                                              <td><span class="pb-2 badge badge-{{ $project->status == 'pending'? 'info': ($project->status == 'approved'? 'success': 'danger') }}">{{ $project->status }}</span></td>
                                                <td>
                                                    <form>
                                                      <div class="value-button bg-warning text-white" id="decrease" onclick="decreaseValue(this)" value="Decrease Value">-</div>
                                                      <input type="number" id="number" class="number" value="{{ $project->ranked }}" />
                                                      <input type="hidden"  class="project_id" value="{{ $project->id }}" />
                                                      <div class="value-button bg-success text-white" id="increase" onclick="increaseValue(this)" value="Increase Value">+</div>
                                                    </form>
                                                </td>
                                              <td class="text-center">
                                                <div>
                                                    <a class="btn btn-link p-0" title="Donation Detail" href="{{ route('admin.project-donations', ['id'=> $project->id]) }}" >
                                                        <span class="text-info fas fa-donate"></span></a>

                                                    <a class="btn btn-link p-0" title="Detail" href="{{ route('admin.view-project', ['id'=> $project->id]) }}" >
                                                        <span class="text-info fas fa-eye"></span></a>
                                                    @if($project->status != 'approved')    
                                                    <a class="btn btn-link p-0" title="Edit" href="{{ route('admin.edit-project', ['id'=> $project->id]) }}">
                                                        <span class="text-primary fas fa-edit"></span></a>   
                                                    @endif    
                                                        <a class="btn btn-link p-0 ms-1" title="Delete" href="{{ route('admin.delete-project', ['id'=> $project->id]) }}" onclick="return confirm('Are you sure you want to delete this Project?');">
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
   <script>
   
        $(document).ajaxSend(function() {
          $("#overlay").fadeIn(300);　
        });
   
       function ajaxCall(argData) {
            var data = argData;
            console.log(data);
            $.ajax({
 
                // Our sample url to make request
                url:"{{ route('change-rank') }}",
 
                // Type of Request
                type: "POST",
                data: data,
 
                // Function to call when to
                // request is ok
                success: function (data) {
                    if(data == true){
                        showSuccessToast("This project rank is changed successfully.");
                    }else{
                        showWarningToast("This project rank is not changed.");
                    }
                   
                },
 
                // Error handling
                error: function (error) {
                    
                    showWarningToast(`${error}`);
                }
            })
            .done(function() {
                    setTimeout(function(){
                      $("#overlay").fadeOut(300);
                    },500);
                  });;
        }
  
  
  
       function increaseValue(object) {
         var parent = object.parentNode;
         var project_id = parent.querySelector('.project_id').value;
         var value = parseInt(parent.querySelector(".number").value, 10);
          value = isNaN(value) ? 0 : value;
          value++;
          if(value <= 5){
              parent.querySelector('.number').value = value;
              var data = {'project_id': project_id, 'rank': value, _token: "{{ csrf_token() }}"};
              ajaxCall(data);
          }
          
          
        }
        
        function decreaseValue(object) {
         var parent = object.parentNode;
         var project_id = parent.querySelector('.project_id').value;
         var value = parseInt(parent.querySelector(".number").value, 10);
         if(value != 0){
             
          value = isNaN(value) ? 0 : value;
          value < 1 ? value = 1 : '';
          value--;

           
            parent.querySelector('.number').value = value;
            var data = {'project_id': project_id, 'rank': value, _token: "{{ csrf_token() }}"};
            ajaxCall(data);
               
           }
          
        }
        
        
   </script>
@endsection