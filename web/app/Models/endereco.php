<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class enderecos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pessoa'
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

    public function pessoa()
    {
        return $this->belongsto(endereco::class);
    }
}
