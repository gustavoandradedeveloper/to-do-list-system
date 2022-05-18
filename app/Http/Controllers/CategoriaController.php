<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Método responsavel por lista todos as categorias
    public function index(){
        $pagina = 'categorias';
        return view('categoria/index', ['pagina' => $pagina]);
    }

    public function add(){
        return view('categoria/add');
    }

    public function edit(){
        return view('categoria/edit');
    }

    public function del(){
        return view('categoria/del');
    }
}
