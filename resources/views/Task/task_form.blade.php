@extends('Task.task')
@section('title', 'Create Form')
@section('content')


<div class="container">
    
    <div class="row">
        <div class="col text-center">
            <h1 class="text-success">Create New Task</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{route('task.store')}}" method="POST">
                @csrf
                <!-- Title Input -->
    <div class="form-group">
        <label for="title">Task Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title">
    </div>
    @if ($errors->has('title'))
    <div class="text-danger">{{$errors->first('title')}}</div>
    @endif

    <!-- Description Input -->
    <div class="form-group mt-3">
        <label for="title">Task Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Enter task description">
    </div>
    @if ($errors->has('description'))
    <div class="text-danger">{{$errors->first('description')}}</div>     
    @endif

    <div class="form-group mt-3">
        <div class="row">
            <div class="col-5">
                <label for="date">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" >
            </div>
            @if ($errors->has('start_date'))
    <div class="text-danger">{{$errors->first('start_date')}}</div>     
    @endif
            <div class="col-5">
                <label for="date">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" >
            </div>
            @if ($errors->has('end_date'))
    <div class="text-danger">{{$errors->first('end_date')}}</div>     
    @endif
        </div>      
    </div>
    

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection