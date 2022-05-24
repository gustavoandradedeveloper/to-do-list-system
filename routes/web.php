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
    Route::get('/',[TarefaController::class,'index'])->name('tarefa.index');
    Route::get('add',[TarefaController::class,'add'])->name('tarefa.add');
    Route::post('add',[TarefaController::class,'salvar'])->name('tarefa.salvar');
    Route::get('edit/{id}',[TarefaController::class,'edit'])->name('tarefa.edit');
    Route::post('atualizar/{id}',[TarefaController::class,'atualizar'])->name('tarefa.atualizar');
    Route::get('delete/{id}',[TarefaController::class,'destroy'])->name('tarefa.delete');
    Route::get('concluir/{id}',[TarefaController::class,'concluir'])->name('tarefa.concluir');
});

Route::prefix('categoria')->group(function(){
    Route::get('/',[CategoriaController::class,'index'])->name('categoria.index');
    Route::get('erro/{erroTarefaAssociadaID}',[CategoriaController::class,'erro'])->name('categoria.indexErro');
    Route::get('add',function(){return view('categoria.add');})->name('categoria.add');
    Route::post('add',[CategoriaController::class,'add'])->name('categoria.add');
    Route::get('edit/{id}',[CategoriaController::class,'edit'])->name('categoria.edit');
    Route::post('atualizar/{id}',[CategoriaController::class,'atualizar'])->name('categoria.atualizar');
    Route::get('delete/{id}',[CategoriaController::class,'destroy'])->name('categoria.delete');
});
