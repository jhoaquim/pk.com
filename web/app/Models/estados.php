<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

        protected $table = 'estados';
        protected $fillable = [
        'esta_ibge',
        'esta_uf',
        'esta_nm',
        'esta_aliq_icms',
        ];
}
