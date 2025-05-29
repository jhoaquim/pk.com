<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <link>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" /></link>
        <style>
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <nav class="bg-gray-800 py-4">
            <div class="container mx-auto flex justify-between items-center">
                <div style="padding:10px;">
                    <!-- Logo ou título -->
                    <a href="{{ asset('/site/curriculum/eddie/construcao') }}" class="text-white text-md font-bold">
                        <center><img width='50px;' src="{{ asset('imgs/sistema/pk_siga_branco.png') }}"/>
                        Siga Quem Somos
                        </center>
                    </a>
                </div>

                <div>
                    <!-- Links do menu -->
                    <ul class="flex space-x-4">
                        <li><a href="{{ asset('/site/curriculum/eddie/construcao') }}" class="text-white" style="padding-right:20px;">
                                <b class="font40 text-white"><strong>Serviços</strong></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    @section('content')
        <center style="padding-top:5px;">
        <section class="borda1" style='width:70%; overflow-y: auto;'>
            <nav class="py-4" style="padding:10px;">
                <a href="javascript:history.back()">
                    <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
                </a>
            </nav>

            <img style="width:50px; padding-bottom:30px;" src="{{ asset('imgs/sistema/pk_siga.png') }}" id="pk"/></img>

            <div>
                <h1 style='color: rgb(0,0,139); font-size:20px; padding-left: 10px;'><b1 id="um" class="um toggle-button">PERICIA FORENSE</b1></h1>
            </div>
            <article id="content" data-target="content1">
            <div class="flex justify-center items-center">
                <a href="{{ asset('/site/curriculum/eddie') }}">
                    <img width="350" class="w-50 md:w-75 lg:w-100 borda2"  src="{{ asset('/imgs/sistema/ej/eddie.png') }}">
                </a>

                <p style="text-align: justify; padding-left:25px;">
                Analista <f-cor1> <a href="{{ route('apoio') }}"> Desenvolvedor </a></f-cor1> Técnico Jurídico é um profissional especializado em tecnologia da informação, voltada ao universo
                jurídico; pessoa que presta assessoria jurídica no âmbito administrativo e jurisdicional, as pessoas físicas, jurídicas
                (empresas) e órgãos governamentais, nas questões afetas à Lei e ao Direito. O papel da Pericia Forense Digital é essencial
                na investigação de todos os crimes que acontecem dentro do ambiente digital.
                </p>
            </div>
            <div class="justify-center items-center">
                <p style="text-align: justify;">
                Fraudes, invasões, roubos de dados ou quaisquer tipos de atos ilícitos, de acordo com o estudo do FBI, todas as instituições
                são alvos de ataques, em momento de incerteza estar preparado com sua segurança é fundamental. Mesmo sendo relativamente nova
                no Brasil, a Perícia Forense Digital é uma área que se originou juntamente com a história do direito e da computação moderna.
                Com o advento da LGPD, Lei Geral de Proteção de Dados,  através de seus profissionais, O Computratum.Ius - CENTRO ADVOGADOS,
                propõe todos esses tópicos e consequentemente a troca de informações e experiências, reune profissionais e expõe de forma
                <f-cor1> <a href="{{ asset('/site/curriculum/eddie') }}"> CURRICULAR</a></f-cor1>,  suas qualificações e habilidades.
                </p>
            </div>
            </article>
            <BR>

            <div>
                <h1 style='color: rgb(0,0,139); font-size:20px; padding-left: 10px;'>
                    <b3 id="tres" class="tres toggle-button">
                        DIREITO CONTENCIOSO
                    </b3>
                </h1>
            </div>
            <article id="content" data-target="content2">
                <div class="flex justify-center items-center">
                    <a href="{{ asset('/site/curriculum/edsonbsilva') }}">
                        <img width="450" class="w-50 md:w-75 lg:w-100 borda2" src="{{ asset('/imgs/sistema/ebs/edson.png') }}" >
                    </a>
                    <p style="text-align: justify; padding-left:25px;">
                    Direito Contencioso é a área do Direito que se dedica à resolução de conflitos e disputas através do processo judicial ou
                    administrativo. Em outras palavras, é quando uma questão legal não pode ser resolvida de forma amigável e precisa ser levada
                    para um juiz ou tribunal para uma decisão final.
                    Em um processo contencioso, as partes envolvidas em uma disputa apresentam seus argumentos e provas a um juiz ou tribunal,
                    que irá analisar as evidências e tomar uma decisão. Essa decisão pode ser favorável a uma das partes ou a ambas, dependendo do caso.
                    </p>
                </div>
                <div class="flex items-center text-align: justify; padding-left:5px;">
                    <p style="text-align: justify; padding-left:5px;">
                    O Direito Contencioso abrange diversas áreas do <f-cor1>Direito</a></f-cor1> como:
                    Cível: Disputas entre pessoas físicas ou jurídicas, como questões relacionadas a contratos, indenizações, propriedade,
                    família, etc.
                    Trabalhista: Conflitos entre empregados e empregadores, envolvendo direitos trabalhistas, como demissão, férias, horas extras, etc.
                    Criminal: Acusações de crimes e a defesa dos acusados, envolvendo processos penais.
                    Administrativo: Disputas entre cidadãos e o poder público, como questões relacionadas a concursos públicos, licenças, impostos, etc.
                    Consumerista: Defesa dos direitos dos consumidores em relação a produtos e serviços.
                    </p>
                </div>
            </article>
            <BR>

            <div>
                <h1 style='color: rgb(0,0,139); font-size:20px; padding-left: 10px;'>
                    <b3 id="tres" class="tres toggle-button">
                        DIREITO IMOBILIÁRIO
                    </b3>
                </h1>
            </div>
            <article id="content" data-target="content3">
                <div class="flex justify-center items-center">
                    <a href="{{ asset('construcao') }}">
                        <img width="450" class="w-50 md:w-75 lg:w-100 borda2" src="{{ asset('/imgs/sistema/jm/jm.png') }}" style="padding-right:20px">
                    </a>
                    <p style="text-align: justify; padding-left:25px;">
                    O Direito Imobiliário é um ramo do Direito que se dedica ao estudo e à regulamentação das relações jurídicas que envolvem bens imóveis. Em outras palavras, trata de todas as questões legais relacionadas a imóveis, como casas, apartamentos, terrenos, lojas, entre outros.

                    O que abrange o Direito Imobiliário?

                    Contratos: Compra e venda, locação, permuta, doação, etc.
                    Registros: Registro de imóveis, matrícula, averbações, etc.
                    Usucapião: Aquisição de propriedade por tempo de posse.
                    Direitos reais: Propriedade, posse, usufruto, servidão, etc.
                    </p>
                </div>
                <div class="flex justify-center items-center">
                    Construções: Regulamentação de obras, alvarás de construção, etc.
                    Condomínios: Relações entre condôminos, administração de condomínios, etc.
                    Impostos: Imposto sobre a propriedade territorial urbana (IPTU), Imposto de Transmissão de Bens Imóveis (ITBI), etc.
                    Usucapião: Aquisição da propriedade por tempo de posse.
                    Desapropriações: Processo pelo qual o poder público adquire um imóvel particular por interesse público.
                    Ações possessórias: Medidas judiciais para proteger a posse de um imóvel.
                    Importância do Direito Imobiliário:

                    Segurança jurídica: Garante a segurança nas transações imobiliárias, protegendo os direitos dos compradores e vendedores.
                    Resolução de conflitos: Auxilia na resolução de conflitos relacionados a imóveis, como invasões, dívidas condominiais, etc.
                    Planejamento patrimonial: Permite a organização e proteção do patrimônio imobiliário.
                    Profissionais do Direito Imobiliário:

                    Advogados: Especializados em questões imobiliárias, prestam consultoria, realizam negociações e representam seus clientes em processos judiciais.
                    Corretor de imóveis: Media as negociações entre compradores e vendedores, auxiliando na realização de negócios imobiliários.
                    Notário: Autoriza e registra os atos jurídicos relacionados a imóveis, como escrituras públicas.
                    Registrador de imóveis: Responsável por registrar os direitos reais sobre imóveis, garantindo a publicidade e a segurança jurídica das transações.
                    Em resumo, o Direito Imobiliário é uma área do Direito fundamental para a sociedade, pois regulamenta as relações jurídicas mais importantes envolvendo bens imóveis, garantindo a segurança jurídica e a ordem social.
                </div>
            </article>
            <BR>
            <center class='reg'>Associação Beneficiente Comunitaria Desportiva Burgo &nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
            <BR><BR>
        </section>
        </center>

        <!----------------------------- Modal --------------------------------->

        <script>
            //var article = document.querySelector("#content1");
            const article = document.querySelectorAll("#content");
            const content1      = article[0];
            const content2      = article[1];
            const content3      = article[2];
            // Selecionar todos os botões que controlam o conteúdo
            const articles  = document.querySelectorAll('.toggle-button');
            const btn1      = articles[0];
            const btn2      = articles[1];
            const btn3      = articles[2];

            var var1 ='PERICIA ↑ FORENSE'
            var var1a='PERICIA - FORENSE'
            var var2  ='DIREITO - CONTENCIOSO'
            var var2a ='DIREITO ↑ CONTENCIOSO'
            var var3  ='DIREITO - IMOBILIÁRIO'
            var var3a ='DIREITO ↑ IMOBILIÁRIO'

            articles.forEach(button => {
                btn1.addEventListener('click', () => {
                   /* const Id = btn1.dataset.target;
                    abreContent(btn1, Id);*/
                    if (content1.className == "open") {
                        content1.className = "";
                        btn1.innerHTML  = var1a // Mostrar mais
                    } else {
                        content1.className = "open";
                        btn1.innerHTML  = var1 // Mostrar
                    }
                    console.log('Valor de article:', article);
                });

                btn2.addEventListener('click', () => {
                    if (content2.className == "open") {
                        content2.className = "";
                        btn2.innerHTML  = var2
                    } else {
                        content2.className = "open";
                        btn2.innerHTML  = var2a
                    }
                    console.log('Valor de article:', article);
                });

                btn3.addEventListener('click', () => {
                    // const Id = btn3.dataset.target;
                    // abreContent(btn3, Id);
                    if (content3.className == "open") {
                        content3.className = "";
                        btn3.innerHTML  = var3
                    } else {
                        content3.className = "open";
                        btn3.innerHTML  = var3a
                    }
                });
            });

        </script>

</html>
