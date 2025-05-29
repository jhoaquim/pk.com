<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;


class documento_contas extends Model
{
    use HasFactory;
    protected $fillable = [
        'pessoa_id'
       ,'planocontas_id'
       ,'codconta'
       ,'documento'
       ,'valor'
       ,'emissao'
       ,'vencimento'
       , 'obs'
       ,
   ];
}
