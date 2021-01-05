@extends('admin_layouts.admin_dashboard')
@section('title', 'Create new Subcategory')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            <a class="btn btn-primary mt-2"
               href="{{route('admin.subcategories')}}">{{__('admin/category.return.subcategory')}}</a>
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
                            <div class="card-header">{{__('admin/category.new.subcategory')}}</div>

                            <div class="card-body">
                                <form method="post" action="{{route('admin.create.subcategory')}}" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('admin/category.select.category.name')}}</label>

                                        <div class="col-md-6">
                                            <select name="parent_id" class="select2 form-control">
                                                <optgroup label="{{__('admin/category.select.category.name')}}">
                                                        @foreach($all_categories as $category)
                                                            <option value="{{$category -> id }}">{{$category -> name}}</option>
                                                        @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        @error('parent_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('admin/category.subcategory.name')}}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{__('admin/category.category.slug')}}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="slug"
                                                   value="" required autocomplete="name" autofocus>
                                            @error('slug')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success" checked/>

                                            <label for="switcheryColor4" class="card-title ml-1">{{__('admin/category.category.status')}}</label>

                                            @error("is_active")
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">{{__('admin/category.save')}}</button>
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
