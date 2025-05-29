@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }

</style>


@section('content')
    <section>
    <div class="carregando"></div>
        <center>
            <div class="divTitulo" style="padding-top:30px; padding-bottom:20px;">Registro Selecionado</div></center>
            <!--@csrf-->
            <div class="tabs-content sombra borda1">

                <a href="{{ route('pessoas.listar') }}">
                    <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">&times;</button>
                </a>

                    <!--<div class="btn tabs-menu clearfix">-->
                    <div class="btn tabs-menu">
                        <ul><li><center><a href="#" data-tab="aba1" class="active-tab-menu">Dados</a></center></li></ul>
                        <ul><li><center><a href="#" data-tab="aba2">Endereços</a></center></li></ul>
                    </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div style="padding-bottom:10px; border-radius: 1px;">
                            <br>
                            <label class="fixo"><b class="rotulo">Registro</b>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:20px;">&nbsp;</b>&nbsp;
                            <b style='font-size: 20px;'>&nbsp;{{ $pessoas->id }}</b>
                            </label>
                            <div class="fixo"><b class="rotulo">Pessoa Nome:</b>
                                <input id="nome" name="nome"  value="{{ $pessoas->nome }}" type="text" disabled>
                            </div>
                        </div>

                        <div class="aba1 tabs tab-ativa">
                            <div class='side-a'>
                                <div class="rotulo topo"><b>imagem</b></div>
                                <img class='img-image-xs sombra' src="{{ asset("avatars/".$pessoas->avatar) }}">

                                <div class="sombra" style="width:49%; padding-left:0px; float:left;">
                                    @if ( $pessoas->pessoa_tp === "F" )
                                        <div class="rotulo topo"><b>CPF</b></div>
                                    @else ( $pessoas->pessoa_tp === "J" )
                                        <div class="rotulo topo"><b>CNPJ</b></div>
                                    @endif
                                    <input class="campo" id="cpf_cnpj" name="cpf_cnpj" type="text" value="{{ $pessoas->cpf_cnpj }}" disabled>

                                    @if ( $pessoas->pessoa_tp === "F" )
                                        <div class="rotulo topo"><b>RG</b></div>
                                    @else
                                        <div class="rotulo topo"><b>Inscrição Estadual</b></div>
                                    @endif
                                    <input class="campo" id="rg_ie" name="rg_ie" type="text" value="{{ $pessoas->rg_ie }}" disabled>
                                </div>
                                <div style="width:48%; padding-left:10px; float:left;">
                                    @if ( $pessoas->pessoa_tp === "F" )
                                        <div class="rotulo topo"><b>NIS</b></div>
                                        <input class="campo" id="nis" name="nis" type="text" value="{{ $pessoas->pis }}" disabled>
                                    @else
                                    @endif

                                    <div class="rotulo topo" style="padding-top:25px;"><b>Tipo Pessoa</b></div>
                                    <input type="radio" id="pessoa_tp_fisica" name="pessoa_tp" value="F" {{ $pessoas->pessoa_tp === 'F' ? 'checked' : '' }} class="btn-radio" disabled>&nbsp;<b>Física</b>&nbsp;&nbsp;
                                    <input type="radio" id="pessoa_tp_juridica" name="pessoa_tp" value="J" {{ $pessoas->pessoa_tp === 'J' ? 'checked' : '' }} class="btn-radio"  disabled>&nbsp;Jurídica
                                </div>                            </div>


                            <div class='side-b'>
                                <div class="rotulo" ><b>Observação</b></div>
                                <div>
                                    <textarea style="text-align: left;" rows="8" cols="60" maxlength="500"
                                    class="campo" id="obs" name="obs" type="textarea" placeholder="Observação" disabled>
                                    {{ $pessoas->obs }}
                                    </textarea>
                                </div>
                                <div style="width:48%; padding-left:0px; float:left;">
                                    <div class="rotulo"><b>ultimo acesso</b></div>
                                        <input id="last_used_at" name="last_used_at"
                                        value="{{ dateFormatDatabaseScreen($pessoas->last_used_at, 'screen') }}"
                                    type="text" disabled>
                                </div>
                                <div class="rotulo topo"><b>status</b></div>
                                <input id="status" name="status" type="checkbox" value="true" @if($pessoas->status === 1) checked @endif style="width:25px;" disabled>
                                <label class="rotulo" for="status">Ativo</label>
                            </div>
                        </div><!-- fim aba1-->

                        <div class="aba2 tabs" style="display:inline-block; padding-top:20px; padding-bottom:10px;">

                            <div id='side-a' style="width:50%; padding-left:10px; float:left;">
                                <div class="rotulo"><b>E-mail</b></div>
                                <input class="campo" id="email" name="email" class="email" value="{{ $pessoas->email }}" type="email" placeholder="e-mail@exemplo.com.br" disabled>

                                <div class="rotulo topo"><b>Endere&ccedil;o</b></div>
                                <input class="campo" id="endereco" name="endereco" value="{{ $pessoas->endereco}}" class="required" type="text" placeholder="Preenchimento Obrigatorio"disabled>
                                <div>
                                    <div class="rotulo topo"><b>Bairro / Nr.</b></div>
                                    <input class="campo1" id="bairro" name="bairro" value="{{ $pessoas->bairro }}" class="required" type="text" placeholder="Preenchimento Obrigatorio" disabled>
                                    <input class="campo1" id="nr" name="nr" value="{{ $pessoas->nr }}" type="text"disabled>
                                </div>
                                <div class="topo">
                                    <div class="rotulo"><b>Complemento / CEP</b></div>
                                    <input class="campo1" id="complemento" name="complemento" value="{{ $pessoas->complemento }}" type="text" disabled>
                                    <input class="campo1" id="cep" name="cep" value="{{ $pessoas->cep }}" type="text" disabled>
                                </div>
                            </div>

                            <div id='side-b' style="width:50%; padding-left:10px; float:right;">

                                @if ( $pessoas->pessoa_tp === "F" )
                                    <div class="rotulo"><b>Data Nascimento</b></div>
                                @else ( $pessoas->pessoa_tp === "J" )
                                    <div class="rotulo"><b>Data Registro</b></div>
                                @endif
                                <input class="campo" id="dt_nascimento" name="dt_nascimento"
                                value="{{ dateFormatDatabaseScreen($pessoas->dt_nascimento, 'screen') }}"
                                type="text" disabled>

                                <div class="topo">
                                    <div class="rotulo"><b>Estado(s) / Cidade(s)</b></div>
                                    <select id="estado" name="estado" class="form-label" disabled>
                                        <option value="{{ $pessoas->esta_ibge }}">{{ $pessoas->esta_uf }}</option>
                                    </select>

                                    <select name="municipio" id="municipio" class="form-select" disabled="true" >
                                        <option value="{{ $pessoas->muni_ibge }}">{{ $pessoas->muni_nm }}</option>
                                    </select>
                                </div>

                                <div class="rotulo topo"><b>Associado</b></div>
                                    <input id="associado_id" name="associado_id" type="hidden" value="{{ $pessoas->associado_id }}" disabled>
                                    <select id="associado" name="associado" class="form-label" disabled>
                                        <option value="0" {{ $pessoas->pessoa === 0 ? 'selected' : '' }}>CLIENTE</option>
                                        <option value="1" {{ $pessoas->pessoa === 1 ? 'selected' : '' }}>ADVOGADO</option>
                                        <option value="2" {{ $pessoas->pessoa === 2 ? 'selected' : '' }}>AVULSO</option>
                                    </select>

                            </div>

                        </div><!--fim aba2-->

            </div>

    </section>
    <center class='reg'>DIREITO ELETRÔNICO&nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
    <script src="{{ asset('js/funcoes.js') }}"></script>
    <script type="module">

        $(document).ready(function(){
            var id=$('#estado').val();
            var rota = '/desenv/burgopaulista.com/web/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/estados';

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
                var rota = '/desenv/burgopaulista.com/web/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/estados';
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
                var rota = '/desenv/burgopaulista.com/web/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/municipios';
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


        });

    </script>
@endsection
