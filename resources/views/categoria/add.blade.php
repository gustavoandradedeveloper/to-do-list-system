@extends('layout.app')

@section('main_body')
    <form action="{{route('categoria.add')}}" method="post">
    @csrf
        <div class="form-group pt-5">
            <label for="formGroupExampleInput">Nome</label>
            <input type="text" class="form-control" value="{{old('nome')}}" name="nome" id="formGroupExampleInput" placeholder="Informe o nome da categoria" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
    </form>
@endsection