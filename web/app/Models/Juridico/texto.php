<?php

namespace App\Models\Juridico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class texto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm_arquivo',
        'descricao',
        'created_at',
        'updated_at',
        'status',
    ];
}
