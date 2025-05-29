<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanoContas extends Model
{
    protected $table = 'PlanoContas'; // Especifica o nome da tabela
    protected $fillable = [
        'codconta'
        ,'descricao'
        ,'obs'
    ,
    ];
}
