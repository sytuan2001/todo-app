<?php

use App\Http\Controllers\TodolistController;
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

Route::get('/', [TodolistController::class, 'index']) ->name('index');
Route::post('/todos', [TodolistController::class, 'store']) ->name('store');
Route::delete('/{todolist:id}', [TodolistController::class, 'destroy']) ->name('destroy');
Route::get('todo/index',[TodolistController::class, 'index']) ->name('todo.index');
Route::get('todo/create',[TodolistController::class, 'create']) ->name('todo.create');
Route::get('home',function(){
    return view('home');
});
