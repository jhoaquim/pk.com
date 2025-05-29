<?php

namespace App\Models\processos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id'
        ,'movimentacao_id'
        ,'areas_id'
        ,'referente'
        ,'created_at'
        ,'updated_at'
        ,'dt_system'
        ,'status'
        ,
    ];
}
