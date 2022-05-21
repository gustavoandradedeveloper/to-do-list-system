<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
class TarefaController extends Controller
{
    //Método responsavel por lista todos as tarefas
    public function index(){
        $pagina = 'tarefas';
        
        $objTarefa = new Tarefa();
        $tarefas = $objTarefa->all();

        /* echo'<pre>';
        print_r($tarefas);
        echo'</pre>'; */
        //return view('tarefa/edit');
        return view('tarefa.index', ['pagina' => $pagina,'tarefas' => $tarefas]);
    }

    public function add(Request $objRequest){
        $objTarefa = new Tarefa();

        $objTarefa->nome = $objRequest->nome;
        $objTarefa->dt_inicio = $objRequest->data_inicio;
        $objTarefa->dt_termino = $objRequest->data_termino;
        $objTarefa->status = $objRequest->status;
        $objTarefa->categoria_id = $objRequest->categoria_id;

        $objTarefa->save();
        return redirect()->route('tarefa.index');
    }

    public function edit(){
        
    }

    public function delete(){

        return view('tarefa/del');
    }
}
