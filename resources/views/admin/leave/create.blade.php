@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('leaves.index')}}">All leaves</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register leave</li>
                </ol>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>
    </div>
    <form action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">@csrf

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Leave</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>From date</label>
                            <input type="text" id="datepicker" name="from" 
                            class="form-control @error('from') is-invalid @enderror" 
                            required="">
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>         
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To date</label>
                            <input type="text" id="datepicker1" name="to" 
                            class="form-control  @error('to') is-invalid @enderror" 
                            required="">
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>         
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Type of leave</label>
                            <select class="form-control" name="type">
                                <option value="annualleave">Annual Leave</option>
                                <option value="sickleave">Sick Leave</option>
                                <option value="parental">Parental Leave</option>
                                <option value="other">Other Leave</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description </label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>
                    
                        
                    <div class="form-group m-3">
                        <button class="btn btn-primary " type="submit">Submit</button>
                    </div>
                </div>
                
            </div>
        
        </div>
    </form>
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Date from</th>
            <th scope="col">Date to</th>
            <th scope="col">Description</th>
            <th scope="col">Type</th>
            <th scope="col">Reply</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <th scope="row">1</th>
                <td>{{$leave->from}}</td>
                <td>{{$leave->to}}</td>
                <td>{{$leave->description}}</td>
                <td>{{$leave->type}}</td>
                <td>{{$leave->message}}</td>
                <td>
                    @if($leave->status == 0)
                        <span class="badge bg-danger">Pending</span>
                    @else
                        <span class="badge bg-success">Approved</span>    
                    @endif
                </td>
                <td>
                    <a href="{{route('leaves.edit',[$leave->id])}}"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$leave->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal_{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('leaves.destroy', [$leave->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Leave</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete ? 
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
        </tbody>
    </table>

</div>
    
@endsection
