@extends('admin_layouts.admin_dashboard')
@section('title', 'All tags')
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

            <a class="btn btn-primary mt-2" href="{{route('create.tag.page')}}">{{__('admin/tags.new.tag')}}</a>
            <table class="table table-bordered mt-2">
                <thead>
                <tr>
                    <th scope="col">{{__('admin/tags.id')}}</th>
                    <th scope="col">{{__('admin/tags.name')}}</th>
                    <th scope="col">{{__('admin/tags.slug')}}</th>
                    <th scope="col" class="text-center">{{__('admin/tags.procedurse')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>
                            <a class="btn btn-outline-primary ml-2" href="{{route('update.tag.page', $tag->id)}}">{{__('admin/tags.edit')}}</a>
                            <a class="btn btn-outline-danger ml-2" href="{{route('delete.tag', $tag->id)}}">{{__('admin/tags.delete')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$all_tags->links()}}
        </div>

    </div>
@endsection
