<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('home', compact('tasks'));
    }


    public function create(Request $request)
    {
        // $task = new Task;
        // $task->task = $request->text;
        // $task->save();
        return $request->all();
    }
    public function store(Request $request)
    {
        // validate the form
        $request->validate([
            'task' => 'required|max:200'
        ]);

        // store the data
        DB::table('todos')->insert([
            'task' => $request->task
        ]);

        // redirect
        return redirect('/')->with('status', 'Task added!');
    }
    public function update(Request $request, $id)
    {
        // validate the form
        $request->validate([
            'task' => 'required|max:200'
        ]);

        // update the data
        DB::table('todos')->where('id', $id)->update([
            'task' => $request->task
        ]);

        // redirect
        return redirect('/')->with('status', 'Task updated!');
    }
}
