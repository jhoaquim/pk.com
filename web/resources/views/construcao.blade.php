<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" />

        <style type="text/css">
            @font-face {
                font-family: 'vila madalena';
                font-size  : 18px;
                src        : url("{{ asset('/fonts/vila madalena.otf') }}");
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>Construção</title>

    </head>

    <center>
    <section style='width:70%;'>
        <nav class="py-4" style="padding:10px;">
                <a href="javascript:history.back()">
                    <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
                </a>
        </nav>
        <div>
            <div class="divTitulo">Módulo de Construção</div>
            <font class="text-blue font-bold py-4 px-6">
             <p>Prettusklan Computatrum Ius - Siga</p>
            <font>
        </div>
        <!-- Botão que irá abrir o modal -->
        <div style='padding-top:40px'>
            <button id="demo" data-modal-target="demo" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Abrir Demo
            </button>

            <button id="btqrcode" data-modal-target="demo" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                QrCode Demo
            </button>
        </div>

        <a href="javascript:alert('em Construção!!!')">
            <img id="img1" width='100' src="{{ asset('imgs/sistema/trabalhando.gif') }}">
        </a>
        <font face="arial" size="5" color="#ccc" >
            <div>Desenvolvimento {{ \App\Classes\Datas::dataHora() }}</div>
        </font>

		<!-- Botão que irá abrir o Zoom -->
		<div style='padding-top:40px'>
            <button id="zoom" class="zoomable bg-green-600 hover:bg-red-500 text-white py-2 px-4 rounded">Zoom</button>
        </div>

        <!-- Botão que irá abrir o modal -->
        <button
            type="button"
            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-base font-medium uppercase leading-normal
                text-blue-600 shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300
                hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none
                focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30
                dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
            data-twe-toggle="modal"
            data-twe-target="#sigaBackdrop"
            data-twe-ripple-init
            data-twe-ripple-color="light">
            Botão stático Fundo modal
        </button>

        <!----------------------------- Modal --------------------------------->
        <div data-twe-modal-init
            class="fixed top-5 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
            id="sigaBackdrop"
            data-twe-backdrop="static"
            data-twe-keyboard="false"
            tabindex="-1"
            aria-labelledby="sigaBackdropLabel"
            aria-hidden="true">
        <div
            data-twe-modal-dialog-ref
            class="dark:bg-black pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
            class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">
                <!--Título do Modal -->
                <h5
                class="text-xl font-bold leading-normal text-surface dark:text-blue"
                id="tituloModal">
                Título do Modal
                </h5>
                <!-- Botão Fechamento da Janela -->
                <button
                type="button"
                class="box-content rounded-none border-none hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                data-twe-modal-dismiss
                aria-label="Close">
                <span class="[&>svg]:h-6 [&>svg]:w-6">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
                </button>
            </div>

            <!-- Corpo do Modal -->
            <div
                class="relative contents justify-center p-20 overflow-y-auto overflow-x-hidden"
                data-twe-modal-body-ref>
                Desenvolvimento Técnico Jurídico especializado em tecnologia da informação,
                voltada ao universo jurídico; prestando assessoria jurídica no âmbito
                administrativo e jurisdicional, à pessoas físicas, jurídicas e órgãos
                governamentais, nas questões afetadas à Lei e ao Direito.
                O papel da Pericia Forense Digital é essencial na investigação de todos os
                crimes que acontecem dentro do ambiente digital.

            </div>

            <!-- Modal footer -->
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                <button
                    id="demo"
                    data-modal-target="demo"
                    data-twe-modal-dismiss
                    data-twe-ripple-init
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Fechar
                </button>
                <button id="salvar" data-modal-target="salvar" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                   Salvar
                </button>
            </div>
            </div>
        </div>
        </div>
<!----------------------------------------------------------->
        <script type="module">

                    $(document).ready(function(){

						$(".zoomable").click(function(){
                            $(this).animate({
                                fontSize: "60px"
                            }, 1000);
                        });

                        $("#img1").click(function(){
                            $(this).toggleClass('rotate-image');
                        });

                        $("#demo").click(function(){
                            $.ajax({
                                url: '/executar',
                                method: 'GET',
                                success: function(response) {
                                    console.log(response); // Exibe a resposta do servidor
                                },
                                error: function(err) {
                                    console.error('Erro na solicitação:', err);
                                }
                            });

                            alert('Mensagem do Botão JavaScript jQuery..!');
                        });

                        $("#btqrcode").click(function(){
                            $.ajax({

                                url: '/executar',
                                method: 'GET',
                                success: function(response) {
                                    console.log(response); // Exibe a resposta do servidor
                                },
                                error: function(err) {
                                    console.error('Erro na solicitação:', err);
                                }
                            });

                            alert('Abertura do QrCode Gerado..!');
                        });
                    });
          </script>

    </section>
    </center>
</html>

