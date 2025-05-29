@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }

    .carregando {
        position:absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Altura total da viewport */
        display: block;
        z-index:1000;
        top :0px;
        opacity	: 0.3;
        transition: opacity 500ms;
        background-color: #000;
        background-image: url("{{ asset('imgs/sistema/ajax.gif') }}");
        background-size: 50px 50px; /* Largura de 70px e altura de 70px */
        background-repeat: no-repeat;
        background-position: center; /* Centraliza a imagem de fundo */
        /*background-size: contain;  Garante que a imagem esteja contida dentro do div sem ser cortada */
    }

</style>


@section('content')
    <section>
    <div class="carregando"></div>
        <center>
            <div class="divTitulo" style="padding-top:30px; padding-bottom:20px;">Registro Processo
                <a href="javascript:history.back()">
                    <button class="bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >
                        &times;
                    </button>
                </a>
            </div>
        </center>
            <!--@csrf-->
            <div class="tabs-content">

                    <div class="btn tabs-menu clearfix" style="height:27px;">
                        <ul><li><center><a href="#" data-tab="aba1" class="active-tab-menu">Dados</a></center></li></ul>
                        <ul><li><center><a href="#" data-tab="aba2">Processo</a></center></li></ul>
                    </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div style="padding: 0,5,5,0 px; border-radius: 1px; float: left;">
                            <label class="fixo"><b class="rotulo">Processo Id:</b>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:20px;">&nbsp;</b>&nbsp;
                                <b style="font-size: 14px;">&nbsp;{{ $processos->id }}</b>
                            </label>
                            <div class="fixo">
                                <div><b class="rotulo">Parte Requerente:</b><b style='font-size: 14px;'>{{ substr($processos->nome,0, 30) }}</b></div>
                                <div><b class="rotulo" style="float: left;">Parte Requerida:</b><b style='font-size: 14px;float: left;'>Requerido</b></div>
                                <div><b class="rotulo" style="float: left;">Número:</b><b style='font-size: 14px;'>{{ $processos->referente }}</b></div>
                            </div>
                        </div>

                        <div class="aba1 tabs tab-ativa">
                            <div class='side-a'>
                                <div class="rotulo topo"></div>
                                <img class='img-image-xs sombra' src="{{ asset('imgs/juridico/jur15.png') }}"  style="margin-left:3%;">
                                <div><b class="rotulo">&nbsp;&nbsp;&nbsp;&nbsp;Área:</b>
                                    <b style='font-size: 14px;'>&nbsp;Área Processual</b>
                                </div>
                            </div>

                            <div><b class="rotulo">CPF:</b>
                                <b style='font-size: 14px;'>&nbsp;066.88*.***-**</b>
                            </div>
                            <div><b class="rotulo">RG:</b>
                                <b style='font-size: 14px;'>&nbsp;15.44*.***-*</b>
                            </div>
                            <div><b class="rotulo">NIS:</b>
                                <b style='font-size: 14px;'>&nbsp;128.52*.***-**</b>
                            </div>
                            <div><b class="rotulo">e-mail:</b>
                                <b style='font-size: 14px;'>&nbsp;{{ $processos->email }}</b>
                            </div>
                            <div><b class="rotulo">Data Registro:</b>
                                <b style='font-size: 14px;'>{{ dateFormatDatabaseScreen($processos->created_at, 'screen') }}</b>
                            </div>
                            <div><b class="rotulo" >Ultima Movimentação:</b>
                                <b style='font-size: 14px;'>{{ dateFormatDatabaseScreen($processos->updated_at, 'screen') }}</b>
                            </div>

                            <img style="width:30px; padding-bottom:30px;" src="{{ asset('imgs/icones/img1.png') }}" id="pk"/></img>
                            <div>
                                <h1 style='color: rgb(0,0,139); font-size:15px; padding-left: 10px;'><b1 id="um" class="um toggle-button">&#9660</b1></h1>
                            </div>

                            <article id="content" data-target="content1">
                                <div class="flex justify-center items-center">
                                <a href="{{ route('construir') }}">
                                        <img width="120" class="w-50 md:w-75 lg:w-100 borda2"  src="{{ asset('/imgs/icones/bd1.jpg') }}">
                                    </a>

                                    <p style="text-align: justify; padding-left:25px;">
                                    <f-cor1> <a href="{{ route('construir') }}"> MOVIMENTAÇÃO </a></f-cor1> Processual é o registro de todas as etapas e
                                    eventos que acontecem dentro de um processo judicial, desde o início até o fim.
                                    </p>
                                </div>
                                <div class="justify-center items-center"><br>
                                    <a href="{{ route('construir') }}">                                        <p style="text-align: justify;">
                                        <div><b class="rotulo">Data:&nbsp;&nbsp;</b>
                                        <b style='font-size: 14px;'>&nbsp;&nbsp;</b>'12/05/2025'
                                        <b style='font-size: 14px;'>&nbsp;&nbsp;</b>{{ substr('movimento executado no processo',0, 35) }}
                                        </div>
                                        </p>
                                    </a><br>
                                    <p style="text-align: justify;">
                                    <div><b class="rotulo">Data:&nbsp;&nbsp;</b>
                                    <b style='font-size: 14px;'>&nbsp;&nbsp;</b>'10/05/2025'
                                    <b style='font-size: 14px;'>&nbsp;&nbsp;</b>{{ substr('movimento executado no processo com descrição extensa',0, 35) }}
                                    </div>
                                    </p>
                                    <p style="text-align: justify;">
                                    <div><b class="rotulo">Data:&nbsp;&nbsp;</b>
                                    <b style='font-size: 14px;'>&nbsp;&nbsp;</b>'05/05/2025'
                                    <b style='font-size: 14px;'>&nbsp;&nbsp;</b>{{ substr('movimento executado no processo com descrição extensa',0, 35) }}
                                    </div>
                                    </p>
                                    <p style="text-align: justify;">
                                    <div><b class="rotulo">Data:&nbsp;&nbsp;</b>
                                    <b style='font-size: 14px;'>&nbsp;&nbsp;</b>'30/04/2025'
                                    <b style='font-size: 14px;'>&nbsp;&nbsp;</b>{{ substr('movimento executado no processo com descrição extensa lnlnldfllf fkldjldkgjld kfjlkgjdljldfjl',0, 35) }}
                                    </div>
                                    </p>
                                </div>
                            </article>


                        </div><!-- fim aba1-->

                        <div class="aba2 tabs" style="display:inline-block; padding-top:20px; padding-bottom:10px;">
                            <object data="{{ asset('pdfs/estatuto_abcd.pdf') }}" type="application/pdf" width="100%" height="540px">
                                <p>Seu navegador não suporta a visualização de PDFs.</p>
                            </object>
                            <br><br>
                        </div><!--fim aba2-->

            </div>

    </section>
    <BR><BR><BR>
    <center class='reg'>DIREITO ELETRÔNICO&nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
    <script src="{{ asset('js/funcoes.js') }}"></script>
    <script type="module">

        $(document).ready(function(){
            var id=$('#estado').val();
            var rota = '/desenv/pk/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/estados';

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

            $('#estado').click(function(){
                var id = $('#estado').val();
                var rota = '/desenv/pk/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/estados';
                var selectElement = document.getElementById('estado'); // Substitua 'estado' pelo ID do seu elemento <select>
                var selectedIndex = selectElement.selectedIndex;
                var selectedOption = selectElement.options[selectedIndex];

                if (selectedOption) {
                    var selectedValue = selectedOption.value;
                    console.log(`Item selecionado: ${selectedValue}`);
                    $.get(rota, function(r) {
                        var k = Object.keys(r.estados);
                        var options     ='';
                        for (var i = 0; i < k.length; i++) {
                            var selected = r.estados[i].esta_ibge === $('#estado').val() ? 'selected="selected"' : '';
                            options += '<option value=' + r.estados[i].esta_ibge + ' '+ selected +'>' + r.estados[i].esta_uf + '</option>';
                        }
                        $('#estado').append(options);
                        document.querySelector('#municipio').removeAttribute("disabled");
                    });
                } else {
                    console.log('Nenhum item selecionado.');
                }
            });

            $("#estado").on("change", function() {
                var selectElement = document.getElementById('estado'); // Substitua 'estado' pelo ID do seu elemento <select>
                var selectedIndex = selectElement.selectedIndex;
                var selectedOption = selectElement.options[selectedIndex];
                var id = selectedOption.value;
                var rota = '/desenv/pk/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/municipios';
                $.get(rota, function(r) {
                    var k = Object.keys(r.municipios);
                    var options     ='';
                    for (var i = 0; i < k.length; i++) {
                        var selected = r.municipios[i].muni_ibge === $('#municipio').val() ? 'selected' : '';
                        options += '<option value=' + r.municipios[i].muni_ibge + ' '  + '>' + r.municipios[i].muni_nm + '</option>';
                    }

                    $('#municipio').empty();
                    $('#municipio').append(options);
                    $('.carregando').css({ width: $(document).width(), height: $(document).height() })
                    .appendTo('body').css('display', 'none');

                });

            });
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

            var var1 ='&#9650;'
            var var1a='&#9660;'
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
        });

    </script>
@endsection
