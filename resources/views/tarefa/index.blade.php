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
            <th style="width: 2%">#</th>
            <th style="width: 30%" class="text-center">Nome</th>
            <th style="width: 10%">Data Inicial</th>
            <th style="width: 10%">Data Final</th>
            <th style="width: 10%">Categoria</th>
            <th style="width: 10%">Status</th>
            <th style="width: 20%" class="text-center">Ações</th>
        </tr>     
        @if (isset($tarefas))
            @foreach ($tarefas as $tarefa)
            <?php
                $dt_inicio = implode('-', array_reverse(explode('-',$tarefa->dt_inicio)));
                $dt_termino = implode('-', array_reverse(explode('-',$tarefa->dt_termino)));
            ?>
                <tr>
                    <td>{{$tarefa->id}}</td>
                    <td class="text-center">{{ $tarefa->tarefa_nome }}</td>
                    <td>{{ $dt_inicio}}</td>
                    <td>{{ $dt_termino }}</td>
                    <td>{{$tarefa->categoria->categoria_nome}}</td>
                    <td>{{ (($tarefa->status == 1)? 'Aberta' : 'Concluida' )}}</td>
                    <td>
                        @if ($tarefa->status == 2 )
                            <a href="{{route('tarefa.edit',$tarefa->id)}}" type="button" class="btn btn-primary btn-sm" >Editar</a>
                            <a href="{{route('tarefa.delete',$tarefa->id)}}" type="button" class="btn btn-danger btn-sm mr-5">Apagar</a>
                        @else
                            <a href="{{route('tarefa.concluir',$tarefa->id)}}" type="button" class="btn btn-success btn-sm" >Concluída</a>
                            <a href="{{route('tarefa.edit',$tarefa->id)}}" type="button" class="btn btn-primary btn-sm ">Editar</a>
                            <a href="{{route('tarefa.delete',$tarefa->id)}}" type="button" class="btn btn-danger btn-sm ">Apagar</a>
                        @endif
                        
                        
                        
                    </td>
                </tr>        
            @endforeach
        @endif
    </table>
@endsection
