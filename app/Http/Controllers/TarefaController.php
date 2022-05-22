<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
class TarefaController extends Controller
{
    //Método responsavel por lista todos as tarefas
    public function index(){
        $pagina = 'tarefas';   
        $objTarefa = new Tarefa();
        $tarefas = $objTarefa->all();
        
        $lista = DB::table('categorias')
            ->join('tarefas','tarefas.categoria_id','=','categorias.id')
            ->select('tarefas.*', 'categorias.categoria_nome')
            ->get();

        // echo'<pre>';
        // print_r($lista->toArray());
        // echo'</pre>'; 
        // exit();
        
        return view('tarefa.index', ['pagina' => $pagina,'tarefas' => $tarefas, 'listaCategorias'=> $lista]);
    }


    public function add(){
        $objCategoria = new Categoria();
        $lista =  $objCategoria->all();
        return view('tarefa/add',['categorias'=>$lista]);
    }




    public function salvar(Request $objRequest){
        $objTarefa = new Tarefa();
    

        $objTarefa->tarefa_nome = $objRequest->tarefa_nome;
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
