@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">All Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create New Role</li>
                </ol>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <form action="{{route('roles.store')}}" method="post">@csrf
                <div class="card">
                    <div class="card-header">Create New Role</div>
                    <div class="card-body">
                    <div class="form-group mt-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mt-4">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection