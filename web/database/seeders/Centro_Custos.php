<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Financeiro\Centro_Custos;

class Centro_Custos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factory = CentroCustos::factory();
        $dataFromDocx = $factory->getDataFromDocx();

        if (!empty($dataFromDocx)) {
            foreach ($dataFromDocx as $line) {
                $fields = explode(',', $line); // Adjust based on your .docx structure
                if (count($fields) >= 2) { // Ensure enough fields exist
                    Centro_Custos::create([
                        'column1' => trim($fields[0]),
                        'column2' => trim($fields[1]),
                        // ... other columns, you might need more sophisticated logic here
                    ]);
                }
            }
        } else {
            error_log("No data read from .docx file.");
        }
    }
}

/*
Explicação do Seeder:

Ele instancia a factory da sua model.
Chama $factory->getDataFromDocx() para obter os dados do arquivo.
Itera sobre cada linha dos dados lidos.
Divide a linha em campos (assumindo vírgula como separador, ajuste conforme necessário).
Cria um novo registro na sua tabela MySQL usando o método YourModel::create(), mapeando os campos extraídos para as colunas da tabela.
Inclui uma verificação para garantir que dados foram lidos do arquivo.
5. Executar o Seeder:

Execute o seeder para popular a sua tabela:

Bash

php artisan db:seed --class=YourTableSeeder
Substitua YourTableSeeder pelo nome do seu seeder.

Pontos Importantes e Considerações:

Estrutura do Arquivo .docx: A lógica dentro da factory e do seeder para extrair os dados dependerá totalmente da estrutura do seu arquivo .docx. Se os dados estiverem em tabelas, parágrafos com delimitadores específicos, ou em um formato mais complexo, você precisará adaptar o código de acordo.
Mapeamento de Colunas: Certifique-se de que a ordem e o tipo dos dados extraídos do .docx correspondam às colunas da sua tabela MySQL.
Tratamento de Erros: Implemente tratamento de erros robusto para lidar com arquivos não encontrados, formatos inesperados ou problemas na leitura do conteúdo.
Performance: Ler arquivos .docx e processar grandes volumes de dados pode ser demorado. Considere otimizações se você tiver arquivos muito grandes.
Complexidade: Se a estrutura do seu arquivo .docx for muito complexa, pode ser mais fácil converter o arquivo para um formato mais simples (como CSV ou TXT) e processá-lo usando as funcionalidades nativas do Laravel para leitura de arquivos de texto.

*/
