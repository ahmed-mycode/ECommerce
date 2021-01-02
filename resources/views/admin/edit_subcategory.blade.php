@extends('admin_layouts.admin_dashboard')
@section('title', 'Categories')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            <a class="btn btn-success mt-2"
               href="{{route('admin.categories')}}">{{__('admin/category.return.category')}}</a>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                    {{Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="align-content-end" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-header">{{__('admin/category.edit.category')}}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.update.category', $data->id) }}" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{__('admin/category.category.name')}}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{$data->name}}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{__('admin/category.category.slug')}}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="slug"
                                                   value="{{$data->slug}}" required autocomplete="name" autofocus>
                                            @error('slug')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success"
                                                   @if($data -> is_active == 1)checked @endif/>

                                            <label for="switcheryColor4" class="card-title ml-1">{{__('admin/category.category.status')}}</label>

                                            @error("is_active")
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">{{__('admin/category.edit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
