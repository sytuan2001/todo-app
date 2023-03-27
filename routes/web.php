<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TodoListController::class, 'index']) ->name('index');
Route::post('/todos', [TodoListController::class, 'store']) ->name('store');
Route::delete('/{todolist:id}', [TodoListController::class, 'destroy']) ->name('destroy');
Route::get('todo/index',[TodoListController::class, 'index']) ->name('todo.index');
Route::get('todo/create',[TodoListController::class, 'create']) ->name('todo.create');
Route::get('home',function(){
    return view('home');
});
