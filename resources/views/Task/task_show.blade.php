@extends('Task.task')
@section('title', 'Show Task')
@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1 class="text-success">Task View</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">    
                <!-- Title Input -->
    <div class="form-group">
        <label for="title">Task Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title" value="{{$task->title}}" readonly>
    </div>
   

    <!-- Description Input -->
    <div class="form-group mt-3">
        <label for="title">Task Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Enter task description" value="{{$task->description}}" readonly>
    </div>
    

@endsection