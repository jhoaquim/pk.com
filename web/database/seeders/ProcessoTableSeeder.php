<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Processos\processo;

class ProcessoTableSeeder extends Seeder
{
    protected $processo;

    public function __construct(Processo $processo)
    {
        $this->processo = $processo;
    }

    public function run()
    {

         Processo::create([
             'pessoa_id'         => 1
             ,'movimentacao_id'  => 1
             ,'areas_id'         => 1
             ,'referente'        => '0038795.672020.40363-01'
             ,'created_at'       => now()
             ,'updated_at'       => now()
             ,'dt_system'        => now()
             ,'status'           => 1
         ]);
         processo::create([
             'pessoa_id'         => 5,
             'movimentacao_id'   => 2,
             'areas_id'          => 2,
             'referente'         => '0038795.672020.22222-02',
             'created_at'        => now()
             ,'updated_at'       => now()
             ,'dt_system'        => now()
             ,'status'           => 1
             ,
         ]);

         Processo::create([
             'pessoa_id'         => 6
             ,'movimentacao_id'  => 2
             ,'areas_id'         => 1
             ,'referente'        => '0038795.672020.33333-03'
             ,'created_at'       => now()
             ,'updated_at'       => now()
             ,'dt_system'        => now()
             ,'status'           => 1
             ,
         ]);

        Processo::create([
            'pessoa_id'         => 7,
            'movimentacao_id'   => 1,
            'areas_id'          => 2,
            'referente'         => '0038795.672020.44444-04',
            'created_at'        => now()
            ,'updated_at'       => now()
            ,'dt_system'        => now()
            ,'status'           => 1
        ]);
        Processo::create([
            'pessoa_id'         => 8,
            'movimentacao_id'   => 1,
            'areas_id'          => 3,
            'referente'         => '0038795.672020.55555-05',
            'created_at'        => now()
            ,'updated_at'       => now()
            ,'dt_system'        => now()
            ,'status'           => 1
        ]);
        Processo::create([
            'pessoa_id'         => 9,
            'movimentacao_id'   => 2,
            'areas_id'          => 4,
            'referente'         => '0038795.672020.66666-06',
            'created_at'        => now()
            ,'updated_at'       => now()
            ,'dt_system'        => now()
            ,'status'           => 1
        ]);
    }
}
