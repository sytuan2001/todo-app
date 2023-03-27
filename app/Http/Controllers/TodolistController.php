<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TodoListController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('home',compact('tasks'));
    }


    public function create(Request $request)
    {
        $task = new Task;
        $task->task = $request->text;
        $task->save();
        return 'Done';
    }



   
}
