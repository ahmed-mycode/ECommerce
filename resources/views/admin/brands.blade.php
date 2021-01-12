@extends('admin_layouts.admin_dashboard')
@section('title', 'Brands')
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
            @elseif(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="align-content-end" aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <a class="btn btn-primary mt-2" href="{{route('create.brand.page')}}">{{__('admin/brand.add.new.brand')}}</a>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th scope="col">{{__('admin/brand.brand.id')}}</th>
                        <th scope="col">{{__('admin/brand.brand.photo')}}</th>
                        <th scope="col">{{__('admin/brand.brand.name')}}</th>
                        <th>            {{__('admin/brand.brand.status')}}</th>
                        <th scope="col" class="text-center">{{__('admin/brand.brand.procedurse')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allBrands as $b)
                        <tr>
                            <th scope="row">{{$b->id}}</th>
                            <td><img src="{{asset('admin/images/brands/'.$b->photo)}}"></td>
                            <td>{{$b->name}}</td>
                            @if($b->is_active === true)
                                <td>{{__('admin/brand.active')}}</td>
                            @else
                                <td>{{__('admin/brand.inactive')}}</td>
                            @endif
                            <td>
                                <a class="btn btn-outline-primary ml-2" href="{{route('update.brand.page', $b->id)}}">{{__('admin/brand.edit')}}</a>
                                <a class="btn btn-outline-danger ml-2" href="{{route('delete.brand', $b->id)}}">{{__('admin/brand.delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$allBrands->links()}}
        </div>

    </div>
@endsection
