<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

# Models
use App\Models\Financeiro{
                CentroCusto,
                User
              };

class Lancamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lancamentos';
    protected $primaryKey = 'id';
    protected $dates = [
                        'dt_faturamento',
                        'dt_system',
                        'created_at',
                        'updated_at',
                        'deleted_at'
                    ];

    protected $fillable = [
                            'id_user',
                            'id_centro_custo',
                            'descricao',
                            'observacoes',
                            'dt_faturamento',
                            'dt_system',
                            'valor'
                        ];
    /*
     |----------------------------------------
     | Relacionamentos
     | https://laravel.com/docs/9.x/eloquent-relationships#main-content
     |----------------------------------------
     */

     public function usuario()
     {
        return $this->hasOne(User::class,'id_user','id_user');
     }

     public function centroCusto()
     {
        return $this->belongsTo(CentroCusto::class,'id_centro_custo','id_centro_custo');
     }


}
