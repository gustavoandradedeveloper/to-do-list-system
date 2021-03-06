@extends('layout.app')

@section('main_body')
    <div>
        <h2 style="margin-top: 5%"><span class="badge bg-secondary">Categorias</span></h2>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('categoria.add') }}" class="btn btn-success"> <span style="font-size: 20px"><strong>+</strong></span>
            Categoria</a>
    </div>
    @isset($erroTarefaAssociadaID)
        <div class="bg-danger text-light text-center mt-3">Oops... Sinto muito, mas você não pode apagar essa categoria, existe uma tarefa associada a ela!</div>
    @endisset
    <table style="margin-top: 2%" class="table table-hover">
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 80%">Nome</th>
            <th style="width: 15%">Ações</th>
        </tr> 
        @if (isset($listaCategorias))
            @foreach ($listaCategorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->categoria_nome }}</td>
                    <td>
                        <a href="{{route('categoria.edit',$categoria->id)}}" type="button" class="btn btn-primary btn-sm">Editar</a>
                        
                        <a href="{{route('categoria.delete',$categoria->id)}}" type="button" class="btn btn-danger btn-sm">Apagar</a>   
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection
