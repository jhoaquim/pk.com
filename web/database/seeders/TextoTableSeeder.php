<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Editor\Texto;

class TextoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Texto::create([
            'nome'  => 'Procuração AD Judicia',
            'status'=> 'A',
            'obs'   => 'A procuração ad judicia é um instrumento jurídico essencial no Direito Brasileiro,
                        permitindo a representação legal de uma pessoa física ou jurídica por meio de um advogado.
                        Essa procuração concede poderes gerais para atuação do advogado, permitindo que ele pratique
                        atos de foro geral e também extrajudiciais para defesa e representação diante de tribunais e
                        demais agentes do direito. o advogado fica habilitado a conduzir todos os atos do processo do
                        outorgante, com exceção daqueles delimitados no Art. 105 do Novo Código de Processo Civil.'
        ]);

        Texto::create([
            'nome'  => 'HABEAS CORPUS - falta de justa causa',
            'status'=> 'A',
            'obs'   => 'O Habeas Corpus é um termo em latim que significa “que tenhas o corpo”. Trata-se de um direito
                        fundamental assegurado pela Constituição Federal do Brasil, no artigo 5º, inciso LXVIII.
                        Esse recurso jurídico busca garantir a liberdade de locomoção de uma pessoa quando ela está
                        ilegalmente detida ou sofrendo ameaça de constrangimento ilegal.'
        ]);

        Texto::create([
            'nome'  => 'INDÉBITO - tust tusd',
            'status'=> 'A',
            'obs'   => 'A repetição de indébito é o direito e a ação que tem como objetivo a devolução de valores
                       cobrados indevidamente de uma pessoa. TUSD é a sigla para Tarifa de Utilização de Serviços
                       de Distribuição, enquanto TUST representa a Tarifa de Utilização de Serviços de Transmissão.
                       Nas tarifas estão relacionadas à compra de energia elétrica.'
        ]);


    }
}
