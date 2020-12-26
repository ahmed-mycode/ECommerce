@extends('admin_layouts.admin_dashboard')
@section('title', 'Categories')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="align-content-end" aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <a class="btn btn-success mt-2" href="">اضافة قسم </a>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col">رقم القسم</th>
                        <th scope="col">الاسم بالرابط</th>
                        <th scope="col">الاســـــم</th>
                        <th>الحالـــة</th>
                        <th scope="col" class="text-center">الاجرائـــــات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allCategories as $c)
                        <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{$c->slug}}</td>
                            <td>{{$c->name}}</td>
                            @if($c->is_active === true)
                                <td>مفعــــل</td>
                            @else
                                <td>غير مفعــــل</td>
                            @endif
                            <td>
                                <a class="btn btn-outline-primary ml-2" href="{{route('admin.update.category.page', $c->id)}}">تعديل</a>
                                <a class="btn btn-outline-danger ml-2" href="{{route('admin.delete.category', $c->id)}}">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
