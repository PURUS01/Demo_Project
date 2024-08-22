@extends('Task.task')
@section('title', 'Show Task')
@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1 class="text-success">Task View</h1>
        </div>
    </div>
    
    
    <table class="table mt-5">
        <thead>
          <tr>
            
            <th scope="col">Title Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>
                @if ($task->status=="not-started")
                <span class="badge badge-warning">{{$task->status}}</span>
                
                @elseif ($task->status=="in-progress")
                <span class="badge badge-success">{{$task->status}}</span>

                @elseif ($task->status=="finished")
                <span class="badge badge-danger">{{$task->status}}</span>
                    
                @endif
            </td>
            <td>{{$task->start_date}}</td>
            <td>{{$task->end_date}}</td>
            
          </tr>
        </tbody>
      </table>  
</div>
@endsection