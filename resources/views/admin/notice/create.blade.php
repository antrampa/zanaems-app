@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('notices.index')}}">All Notices</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create New Notice</li>
                </ol>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <form action="{{route('notices.store')}}" method="post">@csrf
                <div class="card">
                    <div class="card-header">Create New Notice</div>
                    <div class="card-body">
                    <div class="form-group mt-4">
                            <label for="title">Title</label>
                            <input type="title" class="form-control @error('title') is-invalid @enderror" name="title">
                            @error('title')
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
                    <div class="form-group">
                        <label>From date</label>
                        <input type="text" id="datepicker" name="date" 
                        class="form-control @error('date') is-invalid @enderror" 
                        required="">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                        </span>         
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Created by</label>
                        <input type="text" name="name" id="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            required value="{{ auth()->user()->name }}">
                        @error('name')
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
