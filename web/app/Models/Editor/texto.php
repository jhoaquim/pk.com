<?php

namespace App\Models\Editor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class texto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'status',
        'area_id',
        'obs',
        'texto'
    ];
}
