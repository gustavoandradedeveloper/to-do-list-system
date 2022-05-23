@extends('layout.app')

@section('main_body')
    <form action="{{route('categoria.atualizar',$objCategoriaSelecionado->id)}}" method="post">
    @csrf
        <div class="form-group pt-5">
            <label for="formGroupExampleInput">Nome</label>
            <input type="text" class="form-control" value="{{$objCategoriaSelecionado->categoria_nome}}" name="nome" id="formGroupExampleInput" placeholder="Informe o nome da categoria">
        </div>
        <input type="hidden" name="id" value="{{$objCategoriaSelecionado->id}}">
        <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
    </form>
@endsection