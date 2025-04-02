@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Leaves</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Date from</th>
                            <th scope="col">Date to</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Status</th>
                            <th scope="col">Approve/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaves as $leave)
                            <tr>
                                <td>{{$leave->user->name}}</td>
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
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$leave->id}}">
                                        Approve/Reject
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{route('accept.reject',[$leave->id])}}" method="post">@csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Leave</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" name="status" required>
                                                                <option value="0">Pending</option>
                                                                <option value="1">Accept</option>
                                                            </select>
                                                       </div>
                                                       <div class="form-group">
                                                            <label for="message">Message</label>
                                                            <textarea name="message" class="form-control" required></textarea>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Submit</button>
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
            </div>
        </div>

    </div>
</div>
@endsection