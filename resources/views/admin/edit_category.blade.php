@extends('admin_layouts.admin_dashboard')
@section('title', 'Categories')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            <a class="btn btn-success mt-2" href="">عودة الي الاقسام </a>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">انشاء قسم جديد</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.update.category', $data->id) }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">اسم
                                            القسم</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{$data->name}}" required autocomplete="name" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">الاسم
                                            بالرابط</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="slug"
                                                   value="{{$data->slug}}" required autocomplete="name" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success"
                                               @if($data -> is_active == 1)checked @endif/>

                                        <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

                                        @error("is_active")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">تعديل</button>
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
