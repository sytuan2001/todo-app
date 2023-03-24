<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TodolistController extends Controller
{

    public function index()
    {
        $todos = DB::table('todos')->get();
        return view('app', ['todos' => $todos]);
    }


    public function create(Request $request)
    {
        return $request->all();
    }


    public function update(Request $request, $id)
    {
        $existingTodolist = Todolist::find($id);

        if ($existingTodolist) {
            $existingTodolist->completed = $request->Todolist['completed'] ? true : false;
            $existingTodolist->updated_at = Carbon::now();
            $existingTodolist->save();
            return $existingTodolist;
        }
        return "Item not found";
    }

    public function destroy($id)
    {
        $existingTodolist = Todolist::find($id);
        if ($existingTodolist) {
            $existingTodolist->delete();
            return "Item deleted";
        }
        return "Item not found";
    }
}
