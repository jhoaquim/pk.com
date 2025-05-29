<?php

namespace Database\Factories;

use App\Models\Financeiro\Centro_Custos;            //Model da Tabela a ser populada
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpOffice\PhpWord\IOFactory;                    //biblioteca para leitura aruivo .docx

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Financeiro\Centro_Custos>
 */
class CentroCustosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Centro_Custos::class;

    protected $docxFilePath = base_path('public/docs/financeiro/centro_custos.docx');

    /**
     * Define o estado Padrão do Modelo.
     * @return array
     */
    public function definition(): array
    {
        $dataFromDocx = $this->getDataFromDocx();

        if (empty($dataFromDocx)) {
            // Lida com o caso em que o arquivo .docx está vazio ou não pode ser lido
            return [];
        }
        // representar um registro com valores separados por vírgula
        $line = $this->faker->randomElement($dataFromDocx);
        $fields = explode(',', $line);

        return [
            'column1' => $fields[0] ?? null,                // Ajuste o índice com base na estrutura do seu arquivo
            'column2' => $fields[1] ?? null,
            'column3' => $this->faker->dateTimeThisMonth(), // Você pode misturar com dados do Faker
        ];
    }
     /**
     * Lê dados do arquivo .docx.
     * @return array
     */
    protected function getDataFromDocx()
    {
        try {
            $phpWord = IOFactory::load($this->docxFilePath);
            $sections = $phpWord->getSections();
            $data = [];

            foreach ($sections as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        $text = '';
                        foreach ($element->getElements() as $textElement) {
                            if ($textElement instanceof \PhpOffice\PhpWord\Element\Text) {
                                $text .= $textElement->getText();
                            }
                        }
                        if (!empty(trim($text))) {
                            $data[] = trim($text);
                        }
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\Table) {
                        foreach ($element->getRows() as $row) {
                            $rowData = [];
                            foreach ($row->getCells() as $cell) {
                                $cellText = '';
                                foreach ($cell->getElements() as $cellElement) {
                                    if ($cellElement instanceof \PhpOffice\PhpWord\Element\TextRun) {
                                        foreach ($cellElement->getElements() as $textElementInCell) {
                                            if ($textElementInCell instanceof \PhpOffice\PhpWord\Element\Text) {
                                                $cellText .= $textElementInCell->getText();
                                            }
                                        }
                                    } elseif ($cellElement instanceof \PhpOffice\PhpWord\Element\Text) {
                                        $cellText .= $cellElement->getText();
                                    }
                                }
                                $rowData[] = trim($cellText);
                            }
                            if (!empty(array_filter($rowData))) { // Ensure row has some data
                                $data[] = implode(',', $rowData); // Or handle each cell individually
                            }
                        }
                    }
                }
            }

            return $data;
        } catch (\Exception $e) {
            error_log("Error reading .docx file: " . $e->getMessage());
            return [];
        }
    }
}

/*
$docxFilePath: Defina o caminho correto para o seu arquivo .docx.
definition(): Esta função é chamada pelo Laravel para gerar um conjunto de atributos "fake"
para um modelo. Ela chama $this->getDataFromDocx() para ler os dados do arquivo.
Em seguida, ela processa $dataFromDocx (que é um array de linhas de texto ou dados de tabela)
para extrair os valores para as colunas da sua tabela. Você precisará adaptar esta lógica
significativamente com base na estrutura do seu arquivo .docx. O exemplo assume linhas separadas
por vírgulas ou dados tabulares. A função retorna um array associativo onde as chaves são os nomes
das colunas da sua tabela MySQL e os valores são os dados extraídos (ou dados gerados pelo Faker).
getDataFromDocx(): Esta função usa PHPWord para:
Carregar o arquivo .docx.
Iterar pelas seções, elementos (textos, tabelas) e extrair o texto.
Se um elemento for um texto (TextRun ou Text), ele adiciona o texto ao $data array.
Se um elemento for uma tabela (Table), ele itera pelas linhas e células, extrai o texto de cada célula e, opcionalmente, junta os valores da linha com uma vírgula antes de adicionar ao $data. Você pode precisar ajustar como os dados da tabela são extraídos e formatados.
Retorna um array de strings, onde cada string representa uma linha de texto ou uma linha de dados da tabela.
Inclui um bloco try-catch para lidar com erros na leitura do arquivo.
*/
