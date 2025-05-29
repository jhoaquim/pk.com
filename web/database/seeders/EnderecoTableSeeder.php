<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enderecos;

class EnderecoTableSeeder extends Seeder
{
    protected $endereco;

    public function __construct(Enderecos $endereco)
    {
        $this->endereco = $endereco;
    }
    public function run(): void
    {

        Enderecos::create([
            'pessoa_id'     =>  1
            ,'logradouro'   =>  'Rua'
            ,'endereco'     =>  'JORDAO DA COSTA'
            ,'nr'           =>  103
            ,'complemento'  =>  'Apto 01'
            ,'email'        =>  'edjo90@yahoo.com'
            ,'site'         =>  'endereço@site.com'
            ,'esta_ibge'    =>  35
            ,'muni_ibge'    =>  3550308
            ,'cep'          =>  '03563-030'
            ,'bairro'       =>  'Vila Nhocuné'
            ,
        ]);

        Enderecos::create([
            'pessoa_id'     =>  2
            ,'logradouro'   =>  'Avenida'
            ,'endereco'     =>  'DAS NAÇÕES UNIDAS'
            ,'nr'           =>  14401
            ,'complemento'  =>  '17º ao 23º Andar, Torre B1'
            ,'email'        =>  'enel@enel.com.br'
            ,'site'         =>  'https://www.enel.com.br/pt-saopaulo/Para_Voce.html'
            ,'esta_ibge'    =>  35
            ,'muni_ibge'    =>  3550308
            ,'cep'          =>  '04794-000'
            ,'bairro'       =>  'Vila Gertrudes'
            ,
        ]);
    }
}
