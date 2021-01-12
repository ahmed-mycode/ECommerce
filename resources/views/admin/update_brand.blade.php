@extends('admin_layouts.admin_dashboard')
@section('title', 'Update brand')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            <a class="btn btn-success mt-2"
               href="{{route('all.brands')}}">{{__('admin/brand.return.to.all.brands')}}</a>
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
                            @elseif(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                    {{Session::get('error')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="align-content-end" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-header">{{__('admin/brand.update.brand.h')}}</div>

                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <img  src="{{asset('admin/images/brands/'.$brand->photo)}}">
                                    </div>
                                </div>

                            <div class="card-body">
                                <form method="post" action="{{route('update.brand', $brand->id)}}" enctype="multipart/form-data" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('admin/brand.name')}}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{$brand->name}}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$brand->id}}">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('admin/brand.photo')}}</label>
                                        <input type="file" id="file" name="photo">

                                        @error('photo')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success"
                                                   @if($brand->is_active == 1) checked @endif/>

                                            <label for="switcheryColor4" class="card-title ml-1">{{__('admin/category.category.status')}}</label>

                                            @error("is_active")
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit"
                                                    class="btn btn-primary">{{__('admin/brand.edit')}}
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
    </div>
@endsection
