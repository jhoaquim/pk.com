<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Associados extends Model
{
    use HasFactory;

    protected $fillable = [
    'remember_token'
    ,'pessoa'
    ,'nivel'
    ,'status'
    ,'email'
    ,'doc_ident'
    ,'endereco_id'
    ,'last_used_at'
    ,'obs'
    ,
    ];

}
