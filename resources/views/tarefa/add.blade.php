@extends('layout.app')

@section('main_body')
    <form action="{{route('tarefa.salvar')}}" method="post">
    @csrf   
    <fieldset class="mt-5 border p-2">
        <legend class="font-small">
            <i class="far fa-address-card"></i>
                &nbsp;TAREFA
        </legend>  
        <div class="form-group row">
            <div class="col-md-4">
                <label>Tarefa<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tarefa_nome" placeholder="Informe a tarefa" value="">                  
            </div>
            <div class="col-md-4">    
                <label>Categoria <span class="text-danger">*</span></label>
                <select class="form-control custom-select" name="categoria_id">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->categoria_nome}}</option>  
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Status <span class="text-danger">*</span></label>
                <select class="form-control custom-select" name="status">
                    <option value="1"> Aberta</option>  
                    <option value="2"> Concluída</option>
                </select>
            </div>   
            <div class="col-sm-6 mb-1 mt-3 mb-sm-0">
                <label>Data de inicio</label>
                <input type="date" class="form-control form-control" name="data_inicio" value="">
            </div>
           <div class="col-sm-6 mb-1 mt-3 mb-sm-0">
                <label>Data de Termino</label>
                <input type="date" class="form-control form-control" name="data_termino" value="">
            </div>
        </div>
    </fieldset> 
		<div class="mt-3">
			<input type="hidden" name="" value=""/>
			<button type="submit" class="btn btn-success btn-sm">
                <i class="fas fa-check"></i>&nbsp Salvar
            </button>
            <a title="Voltar" href="{{route('tarefa.index')}}" class="btn btn-primary btn-sm ml-2">
                <i class="fas fa-chevron-left"></i>&nbsp Voltar
			</a>
		</div>
    </form>
@endsection