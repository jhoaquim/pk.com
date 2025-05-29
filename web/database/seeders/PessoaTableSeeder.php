<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Pessoas;

class PessoaTableSeeder extends Seeder
{
    protected $pessoa;

    public function __construct(Pessoas $pessoa)
    {
        $this->pessoa = $pessoa;
    }
    public function run()
    {

            Pessoas::create([
                'remember_token'    => Str::random(10)
                , 'nivel'           => 1
                ,'status'           => 1
                ,'nome'     => 'EDMILSON JOAQUIM'
                ,'email'    => 'edjo@yahoo.com'
                ,'rg_ie'    => '154409704'
                ,'cpf_cnpj' => '06688503883'
                ,'pis'      => '12112852185'
                ,'dt_nascimento'    => '1965-09-25'
                ,'avatar'           => 'edmilson.png'
                ,'pessoa_tp'        => 'F'
                ,'last_used_at'     => '2024-05-08 18:30:00'
                ,'obs'              => 'Descrição da Pessoa'
            ]);

            Pessoas::create([
                'remember_token'    => Str::random(10)
                , 'nivel'           => 1
                ,'status'           => 1
                ,'nome'     => 'CLIENTE 2 DE TESTE'
                ,'email'    => 'email@teste.com.br'
                ,'rg_ie'    => '99999999x'
                ,'cpf_cnpj' => '55555555555'
                ,'pis'      => '99999999999'
                ,'dt_nascimento'    => '1900-01-01'
                ,'avatar'           => 'nobody.png'
                ,'pessoa_tp'        => 'F'
                ,'last_used_at'     => '2024-05-15 00:30:00'
                ,'obs'              => 'Descrição da Pessoa teste de inclusão'
            ]);

            Pessoas::create([
                'remember_token'    => Str::random(10)
                , 'nivel'           => 1
                ,'status'           => 1
                ,'nome'     => 'ELETROPAULO METROPOLITANA ELETRICIDADE DE SÃO PAULO S.A.'
                ,'email'    => 'enel@enel.com.br'
                ,'rg_ie'    => '133122090117'
                ,'cpf_cnpj' => '61695227000193'
                ,'pis'      => '99999999999'
                ,'dt_nascimento'    => '1900-01-01'
                ,'avatar'           => 'enel.png'
                ,'pessoa_tp'        => 'J'
                ,'last_used_at'     => '2024-05-15 00:30:00'
                ,'obs'              => 'Descrição da Pessoa teste de inclusão'
            ]);

        $pessoas = Pessoas::factory(10)->create();
    }
}
