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
                            {{ config('app.pkcia') }}
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
        <section class="borda1" style='width:60%; overflow-y: auto;'>
            <nav class="py-4" style="padding:10px;">
                <a href="javascript:history.back()">
                    <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
                </a>
            </nav>

            <img style="width:50px; padding-bottom:30px;" src="{{ asset('imgs/sistema/pk_siga.png') }}" id="pk"/></img>

            <div>
                <h1 style='color: rgb(0,0,139); font-size:20px;'><b1 id="um" class="um toggle-button">PERICIA FORENSE</b1></h1>
            </div>
            <article id="content" data-target="content1">
            <div class="flex justify-center items-center">
                <a href="{{ asset('/site/curriculum/eddie') }}">
                    <img width=70% class="w-50 md:w-75 lg:w-100 borda3"
                    src="{{ asset('/imgs/sistema/ej/eddie.png') }}">
                </a>

                <p style="text-align: justify;">
                    Combinando expertise em direito tributário e tecnologia da informação com especialidade na Perícia Forense, como
                    <f-cor1> <a href="{{ route('apoio') }}">Analista Desenvolvedor Técnico Jurídico</a></f-cor1>, oferecendo assessoria jurídica administrativa e judicial
                    a pessoas físicas, jurídicas e órgãos governamentais.
                    A atuação abrange desde a análise de dados para recuperação fiscal até a aplicação da Perícia Forense Digital na investigação de crimes cibernéticos
                </p>
            </div>
            <div class="justify-center items-center">
                <p style="text-align: justify;">
                Uma área crucial, especialmente com a crescente incidência de fraudes e a importância da proteção de dados (LGPD).
                O Computratum.Ius - PKCia reúne profissionalismo e qualificação para compartilhar informações e experiências nesse
                <f-cor1> <a href="{{ asset('/site/curriculum/eddie') }}">cenário dinâmico</a></f-cor1>.
            </div>
            </article>
            <br><br><br>
            <div>
                <h2 style='color: rgb(0,0,139); font-size:20px;'>
                    <b2 id="dois" class="tres toggle-button">
                        DIREITO CONTENCIOSO
                    </b2>
                </h2>
            </div>
            <article id="content" data-target="content2">
                <div class="flex justify-center items-center">
                    <a href="{{ asset('/site/curriculum/edsonbsilva') }}">
                        <img width=60%  class="w-50 md:w-75 lg:w-100" src="{{ asset('/imgs/sistema/ebs/edson.png') }}" >
                    </a>
                    <p style="text-align: justify;">
                        O Direito Contencioso dedica-se à resolução de conflitos e disputas por meio de processos
                        judiciais ou administrativos. Essencialmente, abrange as situações legais em que a solução amigável
                        não é possível, exigindo a intervenção de um juiz ou tribunal para uma decisão final.
                    </p>
                </div>
                <div class="flex items-center text-align: justify; padding-left:5px;">
                    <p style="text-align: justify; padding-left:5px;">
                        O Direito Contencioso engloba diversas áreas, como:

                        <b>Cível:</b> Disputas entre pessoas físicas ou jurídicas (contratos, indenizações, propriedade, família, etc.).
                        <b>Trabalhista:</b> Conflitos entre empregados e empregadores (direitos trabalhistas, demissão, férias, horas extras, etc.).
                        <b>Criminal:</b> Acusações de crimes e defesa dos acusados (processos penais).
                        <b>Administrativo:</b> Disputas entre cidadãos e o poder público (concursos, licenças, impostos, etc.).
                        <b>Consumerista:</b> Defesa dos direitos dos consumidores (produtos e serviços).

                    </p>
                </div>
            </article>
            <br><br><br>
            <div>
                <h1 style='color: rgb(0,0,139); font-size:20px;'>
                    <b3 id="tres" class="tres toggle-button">
                        DIREITO IMOBILIÁRIO
                    </b3>
                </h1>
            </div>
            <article id="content" data-target="content3">
                <div class="flex justify-center items-center">
                    <a href="{{ asset('construcao') }}">
                        <img width=70%  class="w-50 md:w-75 lg:w-100 borda3" src="{{ asset('/imgs/sistema/jm/jm.png') }}" style="padding-right:20px">
                    </a>

                    <p style="text-align: justify; padding-left:25px;">
                        O <b>Direito Imobiliário</b> é o ramo jurídico dedicado ao estudo e à regulamentação das relações envolvendo
                        bens imóveis, abrangendo desde residências e terrenos até estabelecimentos comerciais.
                        Em essência, disciplina todas as questões legais inerentes à propriedade imobiliária.
                    </p>
                </div>
                <div class="flex items-center text-align: justify; padding-left:5px;">
                    <p style="text-align: justify; padding-left:5px;">
                    <b>O que abrange o Direito Imobiliário?</b><br>

                    <b>Contratos:</b> Compra e venda, locação, permuta, doação, etc.
                    <b>Registros:</b> Matrícula, averbações e o processo de registro de imóveis.
                    <b>Direitos Reais:</b> Propriedade, posse, usufruto, servidão, etc.
                    <b>Usucapião:</b> Aquisição da propriedade pela posse prolongada e quapficada.
                    <b>Construções:</b> Regulamentação de obras e obtenção de alvarás.
                    <b>Condomínios:</b> Normas e relações entre condôminos, administração condominial.
                    <b>Impostos:</b> IPTU, ITBI e outras tributações incidentes sobre imóveis.
                    <b>Desapropriações:</b> Processo de aquisição de propriedade privada pelo poder púbpco por interesse púbpco.
                    <b>Ações Possessórias:</b> Instrumentos judiciais para proteger a posse de bens imóveis.

                    <b>Importância do Direito Imobipário:</b>

                    <b>Segurança Jurídica:</b> Essencial para garantir a proteção dos direitos em transações imobipárias.
                    <b>Resolução de Confptos:</b> Oferece mecanismos legais para solucionar disputas relacionadas a imóveis.
                    <b>Planejamento Patrimonial:</b> Permite a organização e a proteção eficaz do patrimônio imobipário.

                    <b>Profissionais do Direito Imobiliário:</b>

                    <b>Advogados:</b> Especiapstas em consultoria, negociação e representação judicial em questões imobiliárias.
                    <b>Corretores de Imóveis:</b> Intermediários em negociações de compra, venda e locação de imóveis.
                    <b>Notários (Tabeliães):</b> Responsáveis pela formalização de atos jurídicos, como escrituras públicas de imóveis.
                    <b>Registradores de Imóveis:</b> Encarregados do registro dos direitos reais, conferindo publicidade e segurança às transações.

                    <p style="text-align: justify; padding-left:35px;">
                    Em suma, o Direito Imobiliário é um pilar fundamental da ordem social e econômica, regulamentando as relações
                    mais significativas que envolvem a propriedade imobiliária e assegurando a segurança jurídica em um mercado
                    dinâmico e essencial.
                    </p>

                    </p>
                </div>
            </article>
            <br><br>
            <center class='reg'>Computratum.Ius PKCia.com.br &nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
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
