@extends('layout.app')

@section('main_body')
    <div>
        <h2 style="margin-top: 5%"><span class="badge bg-secondary">Tarefas</span></h2>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ url('tarefa') }}" class="btn btn-success"> <span style="font-size: 20px"><strong>+</strong></span>
            Tarefa</a>
    </div>

    <table style="margin-top: 2%" class="table table-hover">
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 40%">Nome</th>
            <th style="width: 10%">Data Inicial</th>
            <th style="width: 10%">Data Final</th>
            <th style="width: 10%">Categoria</th>
            <th style="width: 10%">Status</th>
            <th style="width: 15%">Ações</th>
        </tr>
        @if (isset($categorias))
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->data_inicial }}</td>
                    <td>{{ $categoria->data_final }}</td>
                    <td>{{ $categoria->categoria->nome }}</td>
                    <td>{{ $categoria->status }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm">Apagar</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection
