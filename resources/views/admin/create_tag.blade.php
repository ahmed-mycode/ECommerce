@extends('admin_layouts.admin_dashboard')
@section('title', 'Create new tag')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            <a class="btn btn-success mt-2"
               href="{{route('all.tags')}}">{{__('admin/tags.return.tags')}}</a>
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

                            <div class="card-header">{{__('admin/tags.new.tag')}}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('create.tag') }}" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{__('admin/tags.name')}}</label>
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
                                               class="col-md-4 col-form-label text-md-right">{{__('admin/tags.slug')}}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="slug"
                                                   value="" required autocomplete="name" autofocus>
                                            @error('slug')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">{{__('admin/tags.save')}}</button>
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
