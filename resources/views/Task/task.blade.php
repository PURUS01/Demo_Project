<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Task Form')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- Pusher JS -->
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.2/echo.iife.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    
    var pusher = new Pusher('3623582e356c35bf074f', {
      cluster: 'ap1'
    });
    
    var channel = pusher.subscribe('popup-channel');
    channel.bind('pop-event', function(data) {
      toastr.options = {
        "closeButton": true,
        
      };
      toastr.success(data.message + " :" + data.title);
    
      
    });
    
    </script>
    

  <body>
    
@if (Session::has('fail'))
    <div class="alert-success">{{session::get('fail')}}</div>
        
@endif 

    <a href="{{route('dashboard')}}" class="btn btn-outline-dark btn-sm mt-3">Dashboard</a>
    <a href="{{route('task')}}" class="btn btn-outline-dark btn-sm mt-3">Back to details</a>

    @section('content')
    
    <div class="container">
      <div class="row">
        <div class="col text-center">
            <h1 class="text-success">Task Details</h1>
        </div>
    </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('task.form')}}" class="btn btn-success">Create Task</a>
                
            </div>
        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($tasks))
                @foreach ($tasks as $key => $task )
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    <a href="{{route('task.show',$task->id)}}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{route('task.edit',$task->id)}}" class="btn btn-info btn-sm">Update</a>
                    <form action="{{route('task.delete',$task->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm my-2" >Delete</button>
                    </form>

                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
    </div>


    @show
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>