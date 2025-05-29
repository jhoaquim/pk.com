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

        <title>Apoio Político</title>

    </head>


    <nav class="py-4" style="padding:8px;">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
            </a>
    </nav>
    <center>
    <section>
        <div>
            <div class="divTitulo">Associação Beneficente Comunitaria Desportiva
            <a href="javascript:message('Sempre trabalhando pra você')">
                <img id="img1" width='40' src="{{ asset('imgs/sistema/trabalhando.gif') }}">
            </a>
            </div>
            <font class="text-blue font-bold py-4 px-6">
             <p> Burgo Paulista - Prettusklan </p>
            <font>
        </div>

        <object data="{{ asset('pdfs/img.pdf') }}" type="application/pdf" width="50%" height="500px;">
            <p>Seu navegador não suporta a visualização de PDFs.</p>
        </object>
        <br><br>
        <center class='reg'>Associação Beneficiente Comunitaria Desportiva Burgo &nbsp;{{ \App\Classes\Datas::dataHora() }}</center>

		<!-- Botão que irá abrir o Zoom -->
		<div style="display: flex; justify-content: center; align-items: center; padding-top: 10px;">

                <button id="zoom" class="zoomable py-2 px-4 rounded" background-image= "{{ asset('pdfs/estatuto_abcd.pdf') }}" background-size: cover; background-position: center;></button>

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
                    });
          </script>

    </section>
    </center>
</html>

