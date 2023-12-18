<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new todo();
    }
    public function index()
    {
        // select all from todos
        $response["tasks"] = $this->task->all();

        // can view all tasks
        // dd($response);

        // return view('pages.todo.index')->with($response);
        return view('pages.todo.index')->with($response);

    }


    // posting tasks and view by using dd()
    public function store(Request $request)
    {
        // dd($request);

     //  For one variable it looks like this, so using all() can request to all
        // $this->task->title = $request->title;
        // $this->task->save();

        $this->task->create($request->all());

        return redirect()->back();
    //    after adding a task, redirect to the home page we can use below
    //     return redirect()->route('home');
    }

    public function delete($task_id)
    {
        // To view id when click on delete button
        // dd($task_id);
        $task = $this->task->find($task_id);
        $task->delete();
        return redirect()->back();
    }

    public function done($task_id)
    {
        // To view id when click on delete button
        // dd($task_id);
        $task = $this->task->find($task_id);
        $task->done =1 ;
        $task->update();
        return redirect()->back();
    }


}
?>
