@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }

</style>

<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <center style="padding-top:10px;">
    <section class="borda1" style="width:70%">
        <div style="padding-top:30px; padding-bottom:10px; width:95%">
        <nav style="padding-right:30px;" class="py-2 ">
            <a href="{{ route('dashboard') }}">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
            </a>
        </nav>

        <a href=''
            data-twe-toggle="modal"
            data-twe-target="#sigaBackdrop"
            data-twe-ripple-init
            data-twe-ripple-color="light"><!-- Botão que abre o modal Cadastrar-->
            <div class="divTitulo">Petições - Textos Jurídicos</div>
        </a>
        <br>
        <table id='listagem' style="width:96%;">
            <thead>
                <tr>
                    <th data-priority="1" class="bck01" style="width:7%; text-align:center;">   Id    </th>
                    <th data-priority="1" class="bck01" style="width:24%; text-align:center;"> Área   </th>
                    <th data-priority="2" class="bck01" style="width:32%; text-align:center;"> Nome   </th>
                    <th data-priority="3" class="bck01" style="width:32%; text-align:center;"> Descrição </th>
                    <th data-priority="4" class="bck01" style="width:5%; text-align:center;"> Status </th>
                </tr>
            </thead>

            @foreach($textos as $texto)
                <tr>
                    <td id="id" name="id" class="registro" style="text-align:center;">
                        <a href="textos/editorModal/{{ $texto->id }}"> {{ $texto->id  }} </a>
                    </td>

                    <td id="area_id" name="area_id" class="registro" style="text-align:left;">
                        <a href="textos/editorModal/{{ $texto->id }}">{{ substr($texto->area_nome,0,20) }} </a>
                    </td>

                    <td id="nome" name="nome" class="registro" style="width:32%; text-align:center;">
                        <a href="textos/editorModal/{{ $texto->id }}/pessoas">{{ substr($texto->nome,0,39) }} </a>
                    </td>

                    <td id="obs" name="obs"class = "registro" style="width:32%; text-align:center;">
                        <a href="textos/editorModal/{{ $texto->id }}"> {{ substr($texto->obs,0,40) }} </a>
                    </td>

                    <td id="status" name="status" class = "registro" style="width:5%; text-align:center;">
                        <a href="">{{ $texto->status }} </a>
                    </td>
                </tr>
            @endforeach

        </table>

        <!----------------------------- Modal --------------------------------->
        <div data-twe-modal-init
            class="fixed top-5 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
            id="sigaBackdrop"
            data-twe-backdrop="static"
            data-twe-keyboard="false"
            tabindex="-1"
            aria-labelledby="sigaBackdropLabel"
            aria-hidden="true">
            <div data-twe-modal-dialog-ref class="dark:bg-black pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">
                    <!--Título do Modal -->
                        <h5 id="tituloModal" class="text-sm font-bold leading-normal text-surface dark:text-blue divTitulo">
                            Cadastrar TEXTO
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
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Corpo do Modal -->

                    <form name='editar' action="{{ route('pessoas.adicionar') }}" class="sombra form" method='get'  enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PUT')  <input type="hidden" name="id" >

                        <div style="padding:10px; border-radius: 1px;">

                            <div class="rotulo"><b>Nome: /  CEP:</b></div>
                                <div class="form-group">
                                    <input class="campo1" style="float: left;" id="nome" name="nome" value="" size="70" class="required" type="text" placeholder="nome completo">
                                    <input class="campo3" id="cep" name="cep" value="" type="text" maxlength="9" placeholder="cep">
                                </div>

                            <div class="rotulo"><b>Endere&ccedil;o</b> / <b>n&utilde;mero</b></div>
                                <input class="campo2" style="float: left;" id="endereco" name="endereco" value="" size="70" class="required" type="text" placeholder="endereço">
                                <input class="campo3" id="nr" name="nr" value="" type="text" placeholder="número">

                            <div class="rotulo"><b>Bairro / e-mail </b></div>
                                <input class="campo1" style="float: left;" id="bairro" name="bairro" value="" size="40" class="required" type="text" placeholder="bairro">
                                <input class="campo1 email" id="email" name="email" value="" type="email" placeholder="e-mail@exemplo.com.br">

                            <div class="rotulo"><b>Complemento / data Nascimento</b></div>
                                <input class="campo1" style="float: left;" id="complemento" name="complemento" value="" type="text" placeholder="complemento">
                                <input class="campo1" id="dt_nascimento" name="dt_nascimento" value="" type="text" placeholder="dd/mm/aaaa">

                            <div class="rotulo"><b>Estado(s) / Cidade(s)</b></div>
                                <select class="form-label campo3" style="float: left;" id="estado" name="estado" class="required" >
                                    <option value=""></option>
                                </select>

                                <select class="campo2" name="municipio" id="municipio" class="form-select" disabled="true">
                                    <option value=""></option>-->
                                </select>

                            <div class="rotulo topo campo1"><b>Associado / Tipo Pessoa</b></div>

                                    <input id="associado_id" style="float: left;" name="associado_id" type="hidden" value="">
                                    <select id="associado" name="associado" class="form-label">
                                        <option value="0" >Selecione</option>
                                        <option value="1" >CLIENTE</option>
                                        <option value="2" >ADVOGADO</option>
                                        <option value="3" >ASSOCIADO</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    <input class="btn-radio" type="radio" id="pessoa_tp_juridica" name="pessoa_tp" value="J" checked="false" >&nbsp;Jurídica
                                    <input class="btn-radio" type="radio" id="pessoa_tp_fisica" name="pessoa_tp" value="F" checked="true" >&nbsp;<b>Física</b>&nbsp;&nbsp;

                            <div class="rotulo"><b>cpf-cnpj / rg-Insc.Estadual</b></div>
                                <input class="campo1" style="float: left;" id="cpf_cnpj" name="cpf_cnpj" value="" type="text" placeholder="cpf / cnpj">
                                <input class="campo1" id="rg_ie" name="rg_ie" value="" type="text" placeholder="RG / Inscrição Estadual">

                            <div class="rotulo" ><b>Observação</b></div>
                                    <textarea style="float: left;" style="text-align: left;" rows="2" cols="100" maxlength="500"
                                    class="campo" id="obs" name="obs" type="textarea" placeholder="Observação">
                                    </textarea>

                        </div><!-- Modal footer -->

                        <div class="rotulo"><b>status ativo</b>
                            <input class="campo1" id="status" name="status" value="TRUE" type="checkbox" checked style="width:25px;" disabled>
                            <label class="fixo"><b class="rotulo">{{ dateFormatDatabaseScreen(now(), 'screen') }}
                        </div>
                        <button id="salvar" name="salvar" type="submit" data-modal-target="salvar" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Salvar
                        </button>

                    </form>
                    <div class="carregando"></div>
                    <button id="fechar"
                        data-twe-modal-dismiss
                        data-twe-ripple-init
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('pessoas.listar') }}">Fechar</a>
                    </button>
                    </div>

                </div>

            </div>
        </div>

</center>
<!--------------------------------------------------------------------->
@endsection

<script type="module">
            $(document).ready(function(){
                $('#listagem').DataTable({
                    paging: true,
                    scrollCollapse: true,
                    responsive: true,
                    //scrollX: '500px',
                    //scrollY: true,
                    pagingType: 'full_numbers',
                    language:{
                        url:"../lang/pt-br.json",
                        paginate: {
                            first: '<< Primeiro',
                            previous: '‹ Voltar',
                            next: 'Próximo ›',
                            last: 'Último >>',
                        },
                    },
                    table: '#listagem',
                    columns: [
                        { data: 'id'      }
                        , { data: 'area_id' }
                        , { data: 'nome'    }
                        , { data: 'obs'     }
                        , { data: 'status'  }
                    ],
                    columnDefs: [
                        { targets: [0], orderData: [0, 1] }
                        , { targets: [1], orderData: [1, 0] }
                        , { targets: [2], orderData: [2, 0] }
                        , { targets: [2], orderData: [3, 0] }
                        , { targets: [3], orderData: [4, 0] }

                    ],
                    dom: 'Bfrtip',
                    select: true,
                    buttons: ['colvis'],
                    initComplete: function () {
                        // Estilo para os botões de paginação
                        $('.dataTables_paginate').css('color', 'white' ,
                                                      'font-weight', 'bold'
                        );
                    }
                });

                $('#nome').keyup(function() {
                    $(this).val($(this).val().toUpperCase());
                });

                $('#salvar').submit(function(event) {
                    event.preventDefault(); // Impede o envio padrão do formulário

                    $('carregamento').css('display', 'block');
                    // Envia os dados do formulário via AJAX
                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {

                            //$('carregando').css('display', 'none');

                        },
                        error: function(error) {

                            console.error('Erro ao enviar o formulário:', error);

                        }
                    });
                });

                $('#endereco').on('input', function() {
                    var valCampo = $(this).val();

                    $.ajax({
                        url: "{{ route('pesquisar.textos') }}",
                        type: 'POST',
                        data: { termo: valCampo },
                        success: function(response) {
                            $('#endereco').select2({
                                data: response
                            });
                        }
                    });
                });

                $('#estado').click(function(){
                    var id = $('#esta_ibge').val();
                    //var rota = '/desenv/burgopaulista.com/web/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/estados';
                    var rota = caminhoPublic + 'dashboard/cadastros/pessoas/editar/' + id + '/estados';
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
                });

                $("#estado").on("change", function() {
                var selectElement = document.getElementById('estado'); // Substitua 'estado' pelo ID do seu elemento <select>
                var selectedIndex = selectElement.selectedIndex;
                var selectedOption = selectElement.options[selectedIndex];
                var id = selectedOption.value;
                //var rota = '/desenv/burgopaulista.com/web/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/municipios';

                var rota = caminhoPublic + 'dashboard/cadastros/pessoas/editar/' + id + '/municipios';
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

                $("#dt_nascimento").mask("00/00/0000");

            });

                $("#cep").blur(function() {
                    var cep = $(this).val().replace(/\D/g, ''); //Nova variável "cep" somente com dígitos.

                    if (cep != "") {                    //Verifica se campo cep possui valor informado.
                        var validacep = /^[0-9]{8}$/;   //Expressão regular para validar o CEP.

                        if(validacep.test(cep)) {       //Valida o formato do CEP.
                                                        //Preenche os campos com "..." enquanto consulta webservice.
                            $("#endereco").val("...");
                            $("#bairro").val("...");
                            $("#municipio").val("...");
                            $("#estado").val("...");
                            $("#ibge").val("...");

                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {  //Consulta o webservice viacep.com.br/

                                if (!("erro" in dados)) {   //Atualiza os campos com os valores da consulta.
                                    $("#endereco").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#municipio").val(dados.localidade);
                                    $("#estado").val(dados.uf);
                                    $("#ibge").val(dados.ibge);
                                } else {    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                    // colocar uma marca em cep iinvalido
                                }
                            });
                        } else {    //cep é inválido.
                            limpa_formulário_cep();
                            //$.get(route('mensagem', { var: 'Formato de CEP inválido.' }), function(response) {
                            //    alert('Formato de CEP inválido.');
                            //});
                            alert('Formato de CEP inválido.');
                            $("#cep").val("");
                            $("#cep").focus();

                        }
                    } else {    //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });

                $("#cpf_cnpj").blur(function() {
                    var cpf = $(this).val().replace(/\D/g, '');

                    if (cpf.length !== 11 || !validarCPF(cpf)) {
                        alert('CPF inválido');

                        $(this).val('');

                    }
                });

                $("#rg_ie").blur(function() {

                });

                $("#dt_nascimento").keyup(capturarValorData);

            });

            function mostraValorCampo() {
                // Substitua 'true' ou 'false' pelo valor real que você deseja verificar
                const valorCampo = 'true'; // Exemplo: substituir por mostraValorCampo() quando tiver o elemento 'nome'
                const checkbox = document.getElementById('status');
                checkbox.checked = valorCampo === 'true';
            }
            mostraValorCampo();

            //-------------------------- Campo CEP -------------------------------------------------
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#municipio").val("");
                $("#estado").val("");
                $("#ibge").val("");
            }

            function validarCPF() {
                var cpf = document.getElementById('cpf_cnpj').value;
                cpf = cpf.replace(/\D/g, '');
                if (cpf.length !== 11) { // Verifica se o CPF tem 11 dígitos
                    alert('CPF inválido: deve ter 11 dígitos.');
                    return false;
                }

                var soma = 0;   // Calcula o primeiro dígito verificador
                var resto;
                for (var i = 1; i <= 9; i++)
                    soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i);
                resto = (soma * 10) % 11;
                if ((resto === 10) || (resto === 11))
                    resto = 0;
                if (resto !== parseInt(cpf.substring(9, 10)))
                    return false;  

                soma = 0;       // Calcula o segundo dígito verificador
                for (i = 1; i <= 10; i++)
                    soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i);
                resto = (soma * 10) % 11;
                if ((resto === 10) || (resto === 11))
                    resto = 0;
                if (resto !== parseInt(cpf.substring(10, 11)))
                    return false;  

                    //alert('CPF válido!');
                    return true;
            }

            function capturarValorData() {
                var dataNascimento = $("#dt_nascimento").val();
                $("#dt_nascimento").mask("00/00/0000");
            }

</script>
