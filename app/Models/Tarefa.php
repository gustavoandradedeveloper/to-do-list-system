<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use SoftDeletes;
    use HasFactory;

    //realização de relacionamento entre a tabela categoria
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
    
}