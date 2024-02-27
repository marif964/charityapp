@extends('layouts.admin-app')

@section('title')
  <title>Edit Category</title>
@endsection


@section('styles')
   
@endsection


@section('content')

        @include('partial.top-menu')     
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Module</h1>
                <a href="{{ route('admin.module-list') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{ route('admin.update-module') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row  align-items-center">
                                    <div class="col-md-4">
                                         <div class="mb-3"><label class="form-label" for="heading">Heading</label><input class="form-control" id="heading" type="text" readonly="" name="heading" value="{{ $module->heading }}"></div>   
                                    </div>

                                    <div class="col-md-8">
                                         <div class="mb-3"><label class="form-label" for="title">Title</label><input class="form-control" id="title" type="text" name="title" value="{{ $module->title }}"></div>   
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3"><label class="form-label" for="description">Description</label>
                                            <textarea class="form-control" id="description" type="text" placeholder="info.." name="description">{{ $module->description }}</textarea></div>
                                    </div>

                                    @if($module->heading == "News")

                                    <div class="col-md-4">
                                         <div class="mb-3"><label class="form-label" for="link_title">Link Title</label><input class="form-control" id="link_title" type="text" name="link_title" value="{{ $module->link_title ?? ''  }}"></div>   
                                    </div>

                                    <div class="col-md-8">
                                        <div class="mb-3"><label class="form-label" for="link">Link</label>
                                            <input class="form-control" id="link" type="text" value="{{ $module->link ?? ''}}" name="link"></textarea></div>
                                    </div>

                                    @endif

                                     <div class="col-md-5">
                                         <div class="mb-3"><label class="form-label" for="image">Image/Icon</label><input class="form-control" id="image" type="file" name="image"></div>   
                                    </div>

                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label" for="status">Status</label>
                                             <select class="form-select" aria-label="" name="status" id="status">
                                                 <option value="active" {{ $module->status == 'active'? 'selected=selected': '' }}>Active</option>
                                                <option value="in-active" {{ $module->status == 'in-active'? 'selected=selected': '' }}>In-Active</option>
                                              </select>   
                                        </div>

                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <div class="mb-0">
                                            <input type="hidden" name="id" value="{{ $module->id }}">
                                            <button class="btn btn-success me-1 mb-0 float-end" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

@endsection


@section('scripts')
   
@endsection