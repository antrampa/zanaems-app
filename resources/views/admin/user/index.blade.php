@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All employee</li>
                </ol>
            </nav>
            
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <table class="table table-bordered" id="datatablesSimple" with="100%" collspacing="0"> 
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Start Date</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>SN</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Start Date</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                @if(count($users)>0)
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('profile')}}/{{$user->image}}" width="100" /></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><span class="badge bg-success">{{$user->role->name}}</span></td>
                        <td>{{$user->department->name}}</td>
                        <td>{{$user->designation}}</td>
                        <td>{{$user->start_from}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->mobile_number}}</td>
                        <td><a href="{{route('users.edit',[$user->id])}}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$user->id}}">
                                <i class="fas fa-trash"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{route('users.destroy', [$user->id])}}" method="post">@csrf
                                    {{method_field('DELETE')}}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete {{$user->name}} ? 
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
                        </td>
                    </tr>
                    @endforeach
                @else 
                    <tr>
                        <td colspan="5" align="center">
                            No employees to display
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection