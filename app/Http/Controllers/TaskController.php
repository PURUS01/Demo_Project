<?php

namespace App\Http\Controllers;

use App\Events\popupMessage;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::where('user_id',Auth::user()->id)->get();
      return view('Task.task',compact('tasks'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Task.task_form'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            
        ],
        [
            'title.required'=>'You have to fill title field',
            'description.required'=>'You have to fill description field',
           
        ]);

        
        $task=new Task;
        $task->user_id=Auth::user()->id;
        $task->title=$request->input('title');
        $task->description=$request->input('description');
        $task->start_date=$request->input('start_date');
        $task->end_date=$request->input('end_date');
        
        $save=$task->save();
        
        $event=event(new popupMessage($request->input('title'),'Task Created Successfully'));
        

        if($save){

            return back()->withSuccess('Task created successfully');
        }
        else{
            return back()->withFail('Task created failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        return view('Task.task_show',compact('task'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        return view('Task.update_task',compact('task'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required'
        ],
        [
            'title.required'=>'You have to fill title field',
            'description.required'=>'You have to fill description field',
           
        ]);

        $update=$task->update($request->all());
        event(new popupMessage($request->input('title'),'Task Updated Successfully'));
        if($update){

            return redirect()->route('task')->withSuccess('Task updated successfully');
        }
        else{
            return back()->withFail('Task created failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $delete=$task->delete();
        event(new popupMessage(' ','Task Deleted Successfully'));

        if($delete){

            return back()->withSuccess('Task deleted successfully');
        }
        else{
            return back()->withFail('Task deleted failed');
        }

    }
}
