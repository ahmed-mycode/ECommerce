@extends('admin_layouts.admin_dashboard')
@section('title', 'Categories')
@section('content')
    <div class="container-fluid">
        <div class="app-content content">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="align-content-end" aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <a class="btn btn-primary mt-2" href="{{route('admin.subcategory.page')}}">{{__('admin/category.add.new.subsection')}}</a>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col">{{__('admin/category.category.id')}}</th>
                        <th scope="col">{{__('admin/category.category.slug')}}</th>
                        <th scope="col">{{__('admin/category.subcategory.name')}}</th>
                        <th>{{__('admin/category.category.status')}}</th>
                        <th scope="col" class="text-center">{{__('admin/category.category.procedurse')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories as $s)
                        <tr>
                            <th scope="row">{{$s->parent_id}}</th>
                            <td>{{$s->slug}}</td>
                            <td>{{$s->name}}</td>
                            @if($s->is_active === true)
                                <td>{{__('admin/category.active')}}</td>
                            @else
                                <td>{{__('admin/category.inactive')}}</td>
                            @endif
                            <td>
                                <a class="btn btn-outline-primary ml-2" href="{{route('admin.update.subcategory.page', $s->id)}}">{{__('admin/category.edit')}}</a>
                                <a class="btn btn-outline-danger ml-2" href="{{route('admin.delete.subcategory', $s->id)}}">{{__('admin/category.delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$subcategories->links()}}
        </div>

    </div>
@endsection
