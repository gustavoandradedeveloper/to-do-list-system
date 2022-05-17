<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    //Método responsavel por lista todos as tarefas
    public function index(){
        return view('tarefa/index');
    }

    public function add(){
        return view('tarefa/add');
    }

    public function edit(){
        return view('tarefa/edit');
    }

    public function del(){
        return view('tarefa/del');
    }
}
