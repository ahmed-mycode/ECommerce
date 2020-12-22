@extends('admin_layouts.admin_dashboard')
@section('title', 'Shipping Methods')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                        <form action="{{route('admin.edit', $data->id)}}" method="post" novalidate>
                            @csrf

                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="align-content-end" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <h3>{{__('admin/sidebar.admin.edit.profile')}}</h3>

                            <input type="hidden" name="id" value="{{$data->id}}">

                            <div class="mb-3">
                                <label>{{__('admin/sidebar.admin.name')}}</label>
                                <input type="text" class="form-control" name="name" value="{{$data->name}}">
                                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>{{__('admin/sidebar.admin.email')}}</label>
                                <input type="email" class="form-control" value="{{$data->email}}"
                                       name="email">
                                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{__('admin/sidebar.edit')}}</button>
                        </form>
                </div>
                <!-- Candlestick Multi Level Control Chart -->
            </div>
        </div>
    </div>
@endsection
