<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Associados;

class AssociadosTableSeeder extends Seeder
{
    protected $associado;

    public function __construct(Associados $associado)
    {
        $this->associado = $associado;
    }
    public function run()
    {

            Associados::create([

                'remember_token'    => Str::random(10)
                ,'pessoa'           => 1
                ,'nivel'            => 0
                ,'status'           => 1
                ,'email'        => 'edjo@yahoo.com'
                ,'doc_ident'    => 'OAB 232039-SP'
                ,'endereco_id'  => 1
                ,'last_used_at'     => '2024-06-28 18:00:00'
                ,'obs'              => 'Colaborador Advogado do Sistema'
            ]);

       // $pessoas = Associados::factory(10)->create();
    }
}
