<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Planocontas;

class PlanoContasTableSeeder extends Seeder
{
    protected $planocontas;

    public function __construct(Planocontas $planocontas)
    {
        $this->planocontas = $planocontas;
    }
    public function run(): void
    {

        Planocontas::create([
            'codconta'     =>  '001'
            ,'descricao'   =>  'ATIVOS'
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002'
            ,'descricao'   =>  'PASSIVOS'
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '001.001'
            ,'descricao'   =>  'Ativo Circulante'
            ,'obs'         =>  'o Inclui recursos que podem ser convertidos em dinheiro no curto prazo
                                , geralmente até 12 meses
                               '
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '001.002'
            ,'descricao'   =>  'Ativo Fixo'
            ,'obs'         =>  '1. Imobilizado Corpóreo (Ativo Fixo):Terrenos, edifícios, equipamentos
                                2. Imobilizado Incorpóreo (Ativo Intangível):	Marcas, patentes, softwares
                                Investimentos Financeiros: Participações em outras empresas, ações, títulos, etc.
                                3.	Ativo Realizável a Longo Prazo:
                                Recursos que serão convertidos em dinheiro após o período de 12 meses.
                            	Exemplo: Empréstimos concedidos a terceiros
                                4. Ativo Intangível: Representa bens não físicos, como marcas, patentes e direitos autorais
                               '
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.001'
            ,'descricao'   =>  'Passivo Circulante'
            ,'obs'         =>  'representa todas as obrigações e dívidas financeiras de uma empresa
                                , despesas e obrigações que devem ser quitadas em curto prazo
                               '
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.002'
            ,'descricao'   =>  'Passivo Fixo'
            ,'obs'         =>  'Relaciona-se a dívidas e obrigações de longo prazo (com vencimento após 12 meses).
                                Exemplos: Empréstimos de longo prazo, Debêntures, Financiamentos
                               '
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '001.001.001'
            ,'descricao'   =>  'Caixa'
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '001.001.002'
            ,'descricao'   =>  'Bancos'
            ,'obs'         =>  'Contas Bancarias'
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '001.001.003'
            ,'descricao'   =>  'Contas à Receber'
            ,'obs'         =>  'Carteira Cobrança'
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.001.001'
            ,'descricao'   =>  'Conta de Energia-Luz'
            ,'obs'         =>  ''
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.001.002'
            ,'descricao'   =>  'Conta de Agua'
            ,'obs'         =>  ''
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.001.003'
            ,'descricao'   =>  'Conta de Celular'
            ,'obs'         =>  ''
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.001.004'
            ,'descricao'   =>  'Conta Link Internet'
            ,
        ]);Planocontas::create([
            'codconta'     =>  '002.002.001'
            ,'descricao'   =>  'Empréstimo Longo Prazo'
            ,'obs'         =>  ''
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.002.002'
            ,'descricao'   =>  'Financiamento de Autos'
            ,'obs'         =>  ''
            ,
        ]);
        Planocontas::create([
            'codconta'     =>  '002.002.003'
            ,'descricao'   =>  'Financiamento de Imóveis'
            ,'obs'         =>  ''
            ,
        ]);
    }
}
