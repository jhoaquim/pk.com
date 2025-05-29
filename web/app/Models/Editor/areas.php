<?php

namespace App\Models\Editor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo'
    ];
}
