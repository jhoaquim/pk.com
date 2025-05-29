<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = [
        'level',
        'message',
        'context',
        'channel',
        'datetime',
        'ip_address'
    ];

    protected $casts = [
        'context' => 'array',
        'datetime' => 'datetime',
    ];
}
