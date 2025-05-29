<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Enderecos extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id'
        ,'logradouro'
        ,'endereco'
        ,'nr'
        ,'complemento'
        ,'email'
        ,'site'
        ,'esta_ibge'
        ,'muni_ibge'
        ,'cep'
        ,'bairro'
        ,
    ];

}
