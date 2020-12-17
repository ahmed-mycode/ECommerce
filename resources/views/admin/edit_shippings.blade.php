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
                        <form action="{{route('shippings.edit', $d->id)}}" method="post">
                            @csrf
                            <h3>تعديل وسيلة التوصيل</h3>
                            <div class="mb-3">
                                <label>الاسم</label>
                                <input type="text" class="form-control" name="name" value="{{$d->value}}">
                                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                            </div>

                            <div class="mb-3">
                                <label>Email address</label>
                                <input type="text" class="form-control" name="">
                                <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                            </div>

                            <button type="submit" class="btn btn-primary">تعديل</button>
                        </form>
                    @endforeach
                </div>
                <!-- Candlestick Multi Level Control Chart -->
            </div>
        </div>
    </div>
@endsection
