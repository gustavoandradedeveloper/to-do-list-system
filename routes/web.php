<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/',[Home::class,'index']);
Route::get('/tarefa',[TarefaController::class,'index']);
Route::get('/tarefa/add',[TarefaController::class,'add']);
Route::get('/tarefa/edit',[TarefaController::class,'edit']);


Route::get('/categoria',[CategoriaController::class,'index']);
Route::get('/categoria/add',[CategoriaController::class,'add']);
Route::get('/categoria/edit',[CategoriaController::class,'edit']);