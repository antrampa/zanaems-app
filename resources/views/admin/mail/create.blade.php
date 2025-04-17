@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Mail</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="mail">Select</label>
                            <select name="mail" id="mail" class="form-control">
                                <option value="0">Mail to all staff</option>
                                <option value="1">Choose department</option>
                                <option value="2">Choose person</option>
                            </select>
                            <br>
                            <select name="department" id="department" 
                                class="form-control">
                                <option value="">Select department</option>
                                @foreach(App\Models\Department::all() as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <select name="person" id="person" class="form-control">
                                <option value="">Select person</option>
                                @foreach(App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control 
                                @error('body') is-invalid @enderror"></textarea>
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" name="file" id="file" class="form-control
                                 @error('file') is-invalid @enderror">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<style type="text/css">
    #department {
        display: none;
    }
    #person {
        display: none;
    }
</style>
@endsection