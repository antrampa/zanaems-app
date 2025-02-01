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
</div>
    
@endsection
