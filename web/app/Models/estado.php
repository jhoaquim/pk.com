<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    use HasFactory;
        protected $fillable = [
        'esta_ibge',
        'esta_uf',
        'esta_nm',
        'esta_aliq_icms',
    ];
}
