<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" /></link>
    <title>{{ config('app.name', 'PK.C.Siga') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <style>
        .texto-esquerda {
            text-align: left;
        }
        .texto-direita {
            text-align: right;
        }
        .div-lado-a-lado {
            display: inline-block;
            width: 100%; /* Define a largura de cada div */
            box-sizing: border-box; /* Inclui padding e border na largura */
        }
    </style>

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
                    <li><a href="{{ asset('gerapdf/edsonbsilva') }}" class="text-white font8" style="padding-right:20px;">
                            Gerar PDF<b class="font40 text-white"><strong>CV</strong></b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <center>
            <section style='width:70%; overflow-y: auto;'>
                <nav class="py-4" style="padding:10px;">
                <a href="javascript:history.back()">
                    <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
                </a>
                </nav>
                <div class="div-lado-a-lado">
                    <div id="pessoal" class="texto-esquerda">

                        <p class="f-siga1">Edson Bernardo da Silva</p>
                        <!--<p>Rua Jordão da Costa, 103 apto 1</p>-->
                        <br>Rua Agenor de Barros, 130 </p>
                        <!--<p>vila Nhocuné cep 03563-030 São Paulo - SP</p>-->
                        <p>Ponte Rasa, cep 03881-100 São Paulo - SP</p><br>
                        <img class="image3x4 w-24 md:w-28 lg:w-32" src="{{ asset('/avatars/dr.edsonbsilva.jpg') }}"/><br>
                        <p>Fone  : 5511 94017-7644</p>
                        <p>e-mail: dr.edsonbsilva@hotmail.com</p>
                    </div>
                    <a href="{{ asset('apoio') }}">
                            <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >APOIAMOS</button>
                    </a>
                </div>

                    <div class="texto-esquerda justify-center">
                        <p class="f-cabeca1">Objetivo(s) :</p>
                        <p class="grid justify-items-auto grid-cols-0">
                        Direito Eletrônico Digital, Perícia Judicial, Bacharelado em Direito, Governança de Dados,
                        integração Tecnológicas da ciência Jurídica e da Tecnologia da Informação.
                        </p>

                        <p class="f-cabeca1">Formação Acadêmica</p>

                        <p class="grid justify-items-auto" style="padding-bottom:5px;">
                        <p class="f-entidade">
                            <p class="f-negrito">UNIESP  - 	Universidade São Paulo - UNIESP</p>
                            <p class="f-menor1">Curso de Bacharel de Direito</p>
                            <p class="f-menor1">conclusão  </p>
                        </p>
                    </p>

                    <p class="f-cabeca1">Experiências Profissionais</p>

                    <p><lb class="f-menor1">Empresa :</lb> JS&Silva Advogados Associados
                    <p><lb class="f-menor1">Período :</lb> Jan/2018 – Mai/2019
                    <p><lb class="f-menor1">Cargo   :</lb> Assistente Jurídico
                    <p><p class="f-menor1">Atuação : Atividades do direito contencioso nas areas, Direito Digital Eletrônico, Civil, Penal,
                    Tributário, Trabalhista e Previdenciário.</p></lb>


                </div>

                    <h1 style='color: rgb(0,0,139); font-size:9px; padding-top: 20px;'>PK Curriculum.Siga - DIREITO ELETRÔNICO</h1>

            </section>
        </center>

</html>
