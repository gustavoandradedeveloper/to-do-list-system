<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria ;
use App\Models\Tarefa ;

class CategoriaController extends Controller
{
    public function index(){
        $pagina = 'categorias';
        $objCategoria = new Categoria();
        $categorias = $objCategoria->all();
        $listaCategorias = $categorias;
        return view('categoria/index', ['pagina' => $pagina, 'listaCategorias'=>$listaCategorias]);
    }
    public function add(Request $objRequest){
        $pagina = 'categorias';
        $objRequest->validate([
            'nome' => 'required'
        ]);
        $objCategoria = new Categoria();
        $objCategoria->categoria_nome =  $objRequest->nome; 
        $objCategoria->save();
        return redirect()->route('categoria.index',['pagina'=>$pagina]);
    }
    public function edit($id){
        $pagina = 'categorias';
        $objCategoria = new Categoria();
        $objCategoriaSelecionado = $objCategoria->find($id);
        return view('categoria/edit',['objCategoriaSelecionado'=>$objCategoriaSelecionado, 'pagina'=>$pagina]);
    }
    public function atualizar(Request $objRequest, $id){
        $pagina = 'categorias';
        $objCategoria =Categoria::find($id);
        $objCategoria->categoria_nome = $objRequest->nome;
        $objCategoria->save();
        return redirect()->route('categoria.index',['pagina'=>$pagina]);
    }
    public function destroy($id){
        $objTarefa = new Tarefa;
        $verificandoTarefa = $objTarefa->all();
        $objCategoria = new Categoria;
        $objCategoriaSelecionado = $objCategoria->find($id);

        foreach($verificandoTarefa as $tarefa){
            if($tarefa->categoria_id == $id ){
                $existe = true;
            }else{
                $existe = false;
            }
        }
        if($existe){
            return redirect()->route('categoria.indexErro',['erroTarefaAssociadaID' => $existe]);
        }
        $objCategoriaSelecionado->delete();
        return redirect()->route('categoria.index');
        
    }

    public function erro($erroTarefaAssociadaID){
        $pagina = 'categorias';
        $objCategoria = new Categoria();
        $categorias = $objCategoria->all();
        $listaCategorias = $categorias;
        
        if(isset($erroTarefaAssociadaID)){
            return view('categoria/index', ['pagina' => $pagina, 'listaCategorias'=>$listaCategorias, 'erroTarefaAssociadaID'=>'Erro existe tarefas associada a esse id']);
        }
        return view('categoria/index', ['pagina' => $pagina, 'listaCategorias'=>$listaCategorias]);
    }
}
