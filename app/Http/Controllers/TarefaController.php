<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    //Método responsavel por lista todos as tarefas
    public function index(){
        $pagina = 'tarefas';
        return view('tarefa/index', ['pagina' => $pagina]);
    }

    public function add(){
        return view('tarefa/add');
    }

    public function edit(){
        return view('tarefa/edit');
    }

    public function delete(){

        return view('tarefa/del');
    }
}
