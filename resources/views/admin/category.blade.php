@extends('admin_layouts.admin_dashboard')
@section('title', 'Categories')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="align-content-end" aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::has('error.edit'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{Session::get('error.edit')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="align-content-end" aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <a class="btn btn-primary mt-2" href="">{{__('admin/category.add.new.section')}}</a>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col">{{__('admin/category.category.id')}}</th>
                        <th scope="col">{{__('admin/category.category.slug')}}</th>
                        <th scope="col">{{__('admin/category.category.name')}}</th>
                        <th>{{__('admin/category.category.status')}}</th>
                        <th scope="col" class="text-center">{{__('admin/category.category.procedurse')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allCategories as $c)
                        <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{$c->slug}}</td>
                            <td>{{$c->name}}</td>
                            @if($c->is_active === true)
                                <td>{{__('admin/category.active')}}</td>
                            @else
                                <td>{{__('admin/category.inactive')}}</td>
                            @endif
                            <td>
                                <a class="btn btn-outline-primary ml-2" href="{{route('admin.update.category.page', $c->id)}}">{{__('admin/category.edit')}}</a>
                                <a class="btn btn-outline-danger ml-2" href="{{route('admin.delete.category', $c->id)}}">{{__('admin/category.delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$allCategories->links()}}
        </div>

    </div>
@endsection
