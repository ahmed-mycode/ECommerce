@extends('admin_layouts.admin_dashboard')
@section('title', 'Shipping Methods')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    @foreach($data as $d)
                        <form action="{{route('shippings.edit', $d->id)}}" method="post" novalidate>
                            @csrf

                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <h3>{{__('admin/sidebar.edit.shippings.methods')}}</h3>

                            <div class="mb-3">
                                <label>{{__('admin/sidebar.name')}}</label>
                                <input type="text" class="form-control" name="value" value="{{$d->value}}">
                                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                @error('value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>{{__('admin/sidebar.shipping.cost')}}</label>
                                <input type="number" class="form-control" value="{{$d->plain_value}}" name="plain_value">
                                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                                @error('plain_value')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{__('admin/sidebar.edit')}}</button>
                        </form>
                    @endforeach
                </div>
                <!-- Candlestick Multi Level Control Chart -->
            </div>
        </div>
    </div>
@endsection
