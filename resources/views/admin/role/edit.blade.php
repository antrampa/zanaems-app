@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">All Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Role</li>
                </ol>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <form action="{{route('roles.update', [$role->id])}}" method="post">@csrf
                {{method_field('PATCH')}}
                <div class="card">
                    <div class="card-header">Update Role</div>
                    <div class="card-body">
                    <div class="form-group mt-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{$role->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mt-4">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{$role->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection