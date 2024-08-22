@extends('Task.task')
@section('title', 'Update Form')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>    
@endif
@if (Session::has('fail'))
<div class="alert-success">{{session::get('fail')}}</div>
    
@endif
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1 class="text-success">Update Task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('task.update',$task->id)}}" method="POST">
                @csrf
                @method('PUT')
                <!-- Title Input -->
    <div class="form-group">
        <label for="title">Task Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title" value="{{$task->title}}">
    </div>
    @if ($errors->has('title'))
    <div class="text-danger">{{$errors->first('title')}}</div>
    @endif

    <!-- Description Input -->
    <div class="form-group mt-3">
        <label for="title">Task Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Enter task description" value="{{$task->description}}">
    </div>
    @if ($errors->has('description'))
    <div class="text-danger">{{$errors->first('description')}}</div>
    @endif

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection