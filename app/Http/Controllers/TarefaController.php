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
        return view('tarefa.index', ['pagina' => $pagina,'tarefas' => $tarefas]);
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
    public function edit($id){
        $lista = DB::table('categorias')
            ->where('tarefas.id','=', $id)
            ->join('tarefas','tarefas.categoria_id','=','categorias.id')
            ->select('tarefas.*', 'categorias.categoria_nome')        
            ->get();
        $objTarefa = new Tarefa();
        $objCategoria = new Categoria();
        $objListaCategoria = $objCategoria->all();
        $objTarefaSelecionada = $objTarefa->find($id);
        return view('tarefa/edit',['objTarefaSelecionada'=>$objTarefaSelecionada, 'listaCategorias'=> $objListaCategoria, 'listaTarefas'=>$lista]);
    }
    public function atualizar(Request $objRequest, $id){
        $objTarefa =Tarefa::find($id);
        $objTarefa->tarefa_nome = $objRequest->tarefa_nome;
        $objTarefa->dt_inicio = $objRequest->dt_inicio;
        $objTarefa->dt_termino = $objRequest->dt_termino;
        $objTarefa->categoria_id = $objRequest->categoria_id;
        $objTarefa->status = $objRequest->status;
        $objTarefa->save();
        return redirect()->route('tarefa.index');
    }
    public function destroy($id){
        $objTarefa = new Tarefa();
        $objTarefaSelecionado = $objTarefa->find($id);
        $objTarefaSelecionado->delete();
        return redirect()->route('tarefa.index');
    }
    public function concluir($id){
        $objTarefa = DB::table('tarefas')->where('id', $id)->update(['status' => 2]);
        return redirect()->route('tarefa.index');
      
    }
}
