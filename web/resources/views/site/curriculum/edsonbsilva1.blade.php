<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'PK.C.Siga') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <nav class="bg-gray-800 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div style="padding:10px;">
                <!-- Logo ou título -->
                <a href="{{ asset('/site/curriculum/eddie/construcao') }}" class="text-white text-md font-bold">
                    <center><img width='50px;' src="../../imgs/sistema/pk_siga_branco.png"/>
                        PrettusKlan Computatrum.Siga Curriculum
                    </center>
                </a>
            </div>

            <div>
                <!-- Links do menu -->
                <ul class="flex space-x-4">
                    <li><a href="eddie/construcao" class="text-white" style="padding-right:20px;">Serviços</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="py-4" style="padding:10px;">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
            </a>
    </nav>

        <section style="width:90%">
            <section>
                    <div id="pessoal" class="formato1 _lado"  style="width:90%">
                        <p class="f-siga1">Edson Bernardos da Silva</p><br>
                        <!--<p>Rua Jordão da Costa, 103 apto 1</p>-->
                        <p>Rua Agenor de Barros, 130 </p>
                        <!--<p>vila Nhocuné cep 03563-030 São Paulo - SP</p>-->
                        <p>Ponte Rasa, cep 03881-100 São Paulo - SP</p>

                        <p>Fone  : 5511 94017-7644</p>
                        <p>e-mail: dr.edsonbsilva@hotmail.com</p>
                    </div>
                    <div id="foto" class="_lado">
                            <img class="w-16 md:w-18 lg:w-24" src="{{ asset('/avatars/dr.edsonbsilva.jpg') }}" />
                    </div>


                    <div class="formato1">
                        <p class="f-cabeca1">Objetivo(s) :</p>
                        <p class="grid justify-items-auto grid-cols-0">
                        Direito Contencioso é a área do Direito que se dedica à resolução de conflitos e disputas através
                        do processo judicial ou administrativo.
                        </p>

                        <p class="f-cabeca1">Formação Acadêmica</p>

                        <p class="grid justify-items-auto" style="padding-bottom:5px;">
                        <p class="f-entidade">
                            <p class="f-negrito">Entidade Educacional </p>
                            <p class="f-menor1">Graduação Perícia Judicial </p>
                            <p class="f-menor1"> </p>
                        </p>
                        <p class="f-entidade">
                            <p class="f-negrito">Universidade </p>
                            <p class="f-menor1">Formação em Direito </p>
                            <p class="f-menor1">conclusão  </p>
                        </p>

                        <p class="f-entidade">
                            <p class="f-negrito">Udemy<br>
                            <p class="f-menor1">Certificação EXIN PDPE Essentials – LEI GERAL PROTEÇÃO DADOS - LGPD</p>
                            <p class="f-menor1">Certificação EXIN ISFS – Information Security Foundation ISO/IEC 27001</p>
                            <p class="f-menor1">Certificação COBIT 5 Foundation</p>
                            <p class="f-menor1">PYTHON 3 WEB com DJANGO e DOCKER</p>
                        </p>
                    </p>

                    <p class="f-cabeca1">Experiências Profissionais</p>

                    <p><lb class="f-menor1">Empresa :</lb> SANTRI WEB PROGRAMAS LTDA</p>
                    <p><lb class="f-menor1">Período :</lb> Jun/2021</p>
                    <p><lb class="f-menor1">Cargo   :</lb> Programador de Sistemas de Informação</p>
                    <p><lb class="f-menor1">Atuação : Programação Desenvolvimento Automação de Sistemas para e-Commerce OpenCart e ERP,
                    ORACLE,  MySql, HTML, PHP, JQuery, CSS,  codificação de sistemas padrão MVC , Automação ambientes tecnologia de
                    WebServices, controle de versionamento GIT e GITHub.</p>


                    <p><lb class="f-menor1">Empresa :</lb> JS&Silva Advogados Associados
                    <p><lb class="f-menor1">Período :</lb> Jan/2018 – Mai/2019
                    <p><lb class="f-menor1">Cargo   :</lb> Assistente Jurídico
                    <p><lb class="f-menor1">Atuação : Atividades do direito contencioso nas areas, Direito Digital Eletrônico, Civil, Penal,
                    Tributário, Trabalhista e Previdenciário.

                    <p><lb class="f-menor1">Empresa :</lb> TM Solutions – Tecnologia da Informação
                    <p><lb class="f-menor1">Período :</lb> Nov/2014 - Dez/2017
                    <p><lb class="f-menor1">Cargo   :</lb> Analista Programador de Automação
                    <p><lb class="f-menor1">Atuação : Analise, programação e Desenvolvimento  Sistemas para Automação de dados de Alta e Baixa Plataforma,
                    sistemas CICS, COBOL, JCL, DB2, ORACLE, MSSQL Server, MySql, HTML, PHP, JQuery, Python, Desenvolvimento WEB. Desenvolvimento, scripts
                    de codificação de sistemas padrão MVC, para automação, Gerenciamento de Incidentes, Management Information System . Automação para
                    ambientes JBOSS.</lb>


                    <p class="f-cabeca1">Experiências e Conhecimentos gerais</p>
                    <p class="f-negrito f-menor1">
                    • Ferramentas e Linguagens de Programação e Desenvolvimento
                    Controle de Versionamento Git, GitHub, HTML, PHP, FLASH MX, Delphi7, CLIPPER5,
                    SCRIPTCASE 4, LARAVEL, JQUERY, JAVASCRIPT, CSS,  Python, R Studio, COBOL, CICS, JCL,
                    SHELL SCRIPT, LINUX, Programação WEB, Desenhos e Projetos Industriais, Eletrotécnico e Hidráulicos,
                    Governança , Arquivologia e Documentação, Administração Contratos e Geração de Editais, Noma ISO 27000.
                    </p>
                    <p class="f-negrito f-menor1">
                    • Ferramentas de Banco de Dados
                    MySQL
                    Oracle 8 PL/SQL
                    MSSQL Server
                    DB2 Connect - IBM
                    PostGres
                    </p>
                    <p class="f-negrito f-menor1">
                    • Plataformas
                      Windows Server
                      Netware Novell
                      Lotus Notes - IBM
                      LINUX Serviços DNS , SSH , APACHE, NFS ,SAMBA ,Shell Scripts.
                      Instalação e manutenção de Servidores de Dados.
                    </p>
                </div>
            </section>
            <center>
                <h1 style='color: rgb(0,0,139); font-size:9px; padding-top: 20px;'>PK Curriculum.Siga - DIREITO ELETRÔNICO</h1>
            </center>
        </section>

</html>


