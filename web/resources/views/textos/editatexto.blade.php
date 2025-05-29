@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }

    .retira {
        display: none;
    }
    .coloca {
        display: block;
    }

    textarea {
        -webkit-box-sizing: border-box;
        -moz-box-sizing : border-box;
        box-sizing : border-box;
        width: 80%;
    }

    .modaltexto {
        width: 98%;
        height: 300px;
        overflow-y: auto; /* Adiciona uma barra de rolagem vertical se necessário */
    }
    .inputsistema {
        width : 95%;
        height: 26px;
    }
</style>

@section('content')
    <section>
    <div class="carregando hide"></div>
        <center>
            <a href="textos/editorModal/{{ $textos->id }}/pessoas"
                data-twe-toggle="modal"
                data-twe-target="#sigaBackdrop"
                data-twe-ripple-init
                data-twe-ripple-color="light"><!-- Botão que abre o modal Cadastrar-->
                <div class="divTitulo">Edita Registro Texto</div>
            </a>
        </center>
            <!--@csrf-->
            <div class="tabs-content">

                <a href="javascript:history.back()">
                    <button style="padding-right:30px;" class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">&times;</button>
                </a>

                    <div class="btn tabs-menu">
                        <ul><li><center><a href="#" data-tab="aba1" class="active-tab-menu">Dados Gerais</a></center></li></ul>
                        <ul><li><center><a href="#" data-tab="aba2">Petição Texto</a></center></li></ul>
                    </div>

                    <form name='editar' action="{{ route('pessoas.atualizar', $textos->id) }}" class="sombra" method='post'  enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PUT')  <input type="hidden" name="id" value="{{ $textos->id }}">

                        <div style="padding-bottom:10px; border-radius: 1px;">
                            <br><br>
                            <b class="fixo rotulo">Registro</b>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:20px;">&nbsp;</b>&nbsp;
                                <b style='font-size: 20px;'>&nbsp;{{ $textos->id }}</b>
                                  - Petição :<input id="nome" name="nome" value="{{ $textos->nome }}" type="text" disabled>
                                    <center><img style='width:50px;' class='sombra' src="{{ asset("avatars/".$textos->avatar) }}"></center>
                            </label>
                        </div>

                        <div class="aba1 tabs tab-ativa">

                            <div class="col-lg-12" style="padding-top:25px;">
                                <center>
                                    <textarea id="descricao" name="descricao" rows="6" cols="100" class="form-control" disabled>
                                        {{ $textos->obs }}
                                    </textarea>
                                </center>
                            </div>
                            <div class='side-a'>

                            </div>
                            <div class='side-b'>
                                <div style="width:98%; padding-left:10px; float:left;">
                                    <label class="rotulo"><b>ultimo acesso</b></label>
                                    <label id="last_used_at" name="last_used_at">
                                        {{ dateFormatDatabaseScreen($textos->updated_at, 'screen') }}
                                    <label>

                                    <label class="rotulo topo"><b>status</b></label>
                                    <input id="status" name="status" type="checkbox" value="true" @if($textos->status === 'A') checked @endif style="width:25px;" disabled>
                                    <label class="rotulo" for="status">Ativo</label>
                                </div>
                            </div>
                        </div><!-- fim aba1-->

                        <div class="aba2 tabs" style="padding-top:20px; padding-bottom:10px; display: flex;">
                            <div id='side-a' style="width:24%; padding-left:10px; float:left;">
                                <label class="rotulo">Outorgante:</label><input class="inputsistema" id="outorgante" name="outorgante"  value="Nome Outorgante" type="text">
                                <label class="rotulo">Outorgado :</label><input class="inputsistema" id="outorgado" name="outorgado"  value="Nome Outorgado" type="text">
                                <label class="rotulo">Parte(s)  :</label><input class="inputsistema" id="partes" name="partes"  value="Nome(s) Parte(s)" type="text">
                                <label class="rotulo">OAB       :</label><input class="inputsistema" id="oab" name="oab"  value="OAB Advogado(s)" type="text">
                                <label class="rotulo">Advogado  :</label><input class="inputsistema" id="advogado" name="advogado"  value="Nome(s) Advogado(s)" type="text">
                            </div>
                            <div id='side-b' style="width:74%; padding-left:10px; float:right;">
                                <textarea id="peticao" name="peticao" rows="10" cols="120" class="form-control tinymce-editor">
                                    {{ htmlspecialchars($textos->texto) }}
                                </textarea>
                            </div>
                        </div><!--fim aba2-->


                        <button id="salvar" data-modal-target="salvar" class="retorna bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        &nbsp;&nbsp;Salvar&nbsp;&nbsp;
                        </button>

                    </form>

            </div>

            <!----------------------------- Modal --------------------------------->
            <div class="fixed top-5 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
                id="sigaBackdrop" data-twe-backdrop="static" data-twe-keyboard="false" tabindex="-1" aria-labelledby="sigaBackdropLabel" aria-hidden="true">
                        <div data-twe-modal-dialog-ref class="dark:bg-black pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                                <nav style="padding-right:30px;" class="py-2 ">
                                    <a href="{{ route('dashboard') }}">
                                        <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
                                    </a>
                                </nav>
                                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">

                                    <h5 id="tituloModal" class="text-sm font-bold leading-normal text-surface dark:text-blue divTitulo">
                                    <a href= '{{ $textos->id }}/pessoas'>{{ $textos->nome }}</a>
                                    </h5>


                                <!-- Corpo do Modal -->

                            </div>

                        </div>
            </div>
            <!----------------------------- Final Modal --------------------------------->

    </section>
    <center class='reg'>DIREITO ELETRÔNICO&nbsp;{{ \App\Classes\Datas::dataHora() }}</center>

    <script type="module">

        $(document).ready(function(){

            $('.aba2').css({'display' : 'none'});
            $('.tabs-menu ul li a').click(function(){
                var a = $(this);
                var the_aba = '.' + a.attr('data-tab');
                if ( $('.aba1').hasClass("active-tab-menu") ) {
                } else {
                    $('.tabs-menu ul li a').toggleClass('active-tab-menu');
                    $('.tabs-content .tabs').css({'display' : 'none'});
                    $(the_aba).css({'display':'inline-block'});
                }
                return false;
            });

            $('#outorgante').click(function(){
                $('.carregando').css({  width: $(document).width(),
                                    height: $(document).height(),
                                    position: 'absolute',
                                    top: 0,
                                    left: 0,
                                    transition: 500,
                                    'background-color': 'rgba(0, 0, 0, 0.5)',
                                    'display': 'block',
                                    'justify-content': 'center',
                                    'align-items': 'center'
                });



            });
        });



        $.ajax({
            url: '/config',
            success: function(data) {
                var param1 = 'burgopaulista.com/web';//data.APP_NAME;
            }
        });

        function asset(path) {
            return '/desenv/burgopaulista.com/web/public/' + path;
            //return '/desenv/'+param1+'/public/' + path;
        }
    </script>

    <script src="{{ asset('js/tinymce/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin">
        tinymce.init({
                    selector: 'textarea#peticao',
                    language: 'pt_BR',
                    height  : 250,
                    menubar : true,
                    resize  : false,

                    plugins : [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],

                    toolbar : 'undo redo | styles | formatselect | bold italic | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css',
                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    theme_advanced_blockformats : "p,div,h1,h2,h3,h4,h5,h6,blockquote,dt,dd,code,samp",
                    tinycomments_author: 'Edmilson.Joaquim'
        });


    </script>

@endsection
