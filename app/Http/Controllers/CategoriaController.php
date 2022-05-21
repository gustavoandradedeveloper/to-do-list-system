<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categoria ;

class CategoriaController extends Controller
{

    //Método responsavel por lista todos as categorias
    public function index(){
        $pagina = 'categorias';
        $objCategoria = new Categoria();
        $categorias = $objCategoria->all();
        $listaCategorias = $categorias;
        return view('categoria/index', ['pagina' => $pagina, 'listaCategorias'=>$listaCategorias]);
    }


    public function add(Request $objRequest){
        $objRequest->validate([
            'nome' => 'required'
        ]);
        $objCategoria = new Categoria();
        $objCategoria->nome =  $objRequest->nome; 
        $objCategoria->save();
        return redirect()->route('categoria.index');
    }


    public function edit($id){
        $objCategoria = new Categoria();
        $objCategoriaSelecionado = $objCategoria->find($id);
        return view('categoria/edit',['objCategoriaSelecionado'=>$objCategoriaSelecionado]);
    }


    public function atualizar(Request $objRequest, $id){
        $objCategoria =Categoria::find($id);
        $objCategoria->nome = $objRequest->nome;
        $objCategoria->save();
        return redirect()->route('categoria.index');

    }


    public function destroy($id){
        $objCategoria = new Categoria;
        $objCategoriaSelecionado = $objCategoria->find($id);
        $objCategoriaSelecionado->delete();
        return redirect()->route('categoria.index');
    }
}
