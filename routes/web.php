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

Route::prefix('tarefa')->group(function(){
    Route::get('/',[TarefaController::class,'index'])->name('tarefa');
    Route::get('add',[TarefaController::class,'add']);
    Route::get('edit/:id',[TarefaController::class,'edit']);
    Route::delete('delete/:id',[TarefaController::class,'delete']);
});

Route::prefix('categoria')->group(function(){
    Route::get('/',[CategoriaController::class,'index']);
    Route::get('add',[CategoriaController::class,'add']);
    Route::get('edit/:id',[CategoriaController::class,'edit']);
    Route::delete('delete/{id}/tarefa/{id}',[CategoriaController::class,'delete'])->name('categoria.delete');
});
