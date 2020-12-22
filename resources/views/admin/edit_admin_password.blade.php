@extends('admin_layouts.admin_dashboard')
@section('title', 'Shipping Methods')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <form action="" method="post" novalidate>
                        @csrf

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="align-content-end" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif(Session::has('error_current'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{Session::get('error_current')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="align-content-end" aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @elseif(Session::has('error_confirm'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{Session::get('error_confirm')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="align-content-end" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <h3>{{__('admin/sidebar.admin.edit.password')}}</h3>

                        <div class="mb-3">
                            <label>{{__('admin/sidebar.admin.edit.current')}}</label>
                            <input type="password" class="form-control" name="current">
                            <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                        </div>

                        <div class="mb-3">
                            <label>{{__('admin/sidebar.admin.edit.new')}}</label>
                            <input type="password" class="form-control" name="new">
                            <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                        </div>

                        <div class="mb-3">
                            <label>{{__('admin/sidebar.admin.edit.confirm')}}</label>
                            <input type="password" class="form-control" name="confirm">
                            <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('admin/sidebar.edit')}}</button>
                    </form>
                </div>
                <!-- Candlestick Multi Level Control Chart -->
            </div>
        </div>
    </div>
@endsection
