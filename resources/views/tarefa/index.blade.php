@extends('layout.app')

@section('main_body')
    
    <div>
        <h2 style="margin-top: 5%"><span class="badge bg-secondary">Tarefas</span></h2>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('tarefa.add') }}" class="btn btn-success"> <span style="font-size: 20px"><strong>+</strong></span>
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
        @if (isset($tarefas))
            @foreach ($tarefas as $tarefa)
            <?php
                $dt_inicio = implode('-', array_reverse(explode('-',$tarefa->dt_inicio)));
                $dt_termino = implode('-', array_reverse(explode('-',$tarefa->dt_termino)));
            ?>
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->nome }}</td>
                    <td>{{ $dt_inicio}}</td>
                    <td>{{ $dt_termino }}</td>
                    <td>{{ $tarefa->categoria_id}}</td>
                    <td>{{ $tarefa->status}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm">Apagar</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection
