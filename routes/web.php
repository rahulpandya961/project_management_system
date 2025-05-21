<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('projects', [ProjectController::class,'index'])->name('projects.index');
Route::get('projects/create', [ProjectController::class,'create'])->name('projects.create');
Route::post('projects/store', [ProjectController::class,'store'])->name('projects.store');
Route::get('projects/edit/{id}', [ProjectController::class,'edit'])->name('projects.edit');
Route::put('projects/update/{id}', [ProjectController::class,'update'])->name('projects.update');
Route::delete('projects/delete/{id}', [ProjectController::class,'delete'])->name('projects.destroy');


Route::get('tasks', [TaskController::class,'index'])->name('tasks.index');
Route::get('tasks/create', [TaskController::class,'create'])->name('tasks.create');
Route::post('tasks/store', [TaskController::class,'store'])->name('tasks.store');
Route::get('tasks/edit/{id}', [TaskController::class,'edit'])->name('tasks.edit');
Route::put('tasks/update/{id}', [TaskController::class,'update'])->name('tasks.update');
Route::delete('tasks/delete/{id}', [TaskController::class,'delete'])->name('tasks.destroy');