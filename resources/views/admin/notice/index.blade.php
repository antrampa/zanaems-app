@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Notices</li>
                </ol>
            </nav>
            @if(count($notices) > 0)
            @foreach($notices as $notice)
            <div class="card alert alert-info">
                <div class="card-header alert alert-warning">
                    {{$notice->title}}
                </div>
                <div class="card-body">
                    <p>{{$notice->description}}</p>
                    <p class="badge bg-success">Date: {{$notice->date}}</p>
                    <p class="badge bg-warning">Create by: {{$notice->name}}</p>

                </div>
                <div class="card-footer">
                    @if(isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                        <a href="{{route('notices.edit',[$notice->id])}}"><i class="fas fa-edit"></i></a>
                    @endif
                    @if(isset(auth()->user()->role->permission['name']['notice']['can-delete']))                                        
                        <span class="float-end"> <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$notice->id}}">
                            <i class="fas fa-trash"></i>
                        </a></span>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('notices.destroy', [$notice->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Notice</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete {{$notice->title}} ? 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                        <!-- Model End-->
                     @endif
                </div>
            </div>
            @endforeach
            @else
            <p>No notices created yet.</p>
            @endif
        </div>

    </div>
</div>
@endsection