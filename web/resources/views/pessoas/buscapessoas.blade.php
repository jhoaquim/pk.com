@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }

</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <center style="padding-top:10px;">
    <section class="borda1" style="width:50%; padding-left:5px;">
        <nav style="padding-right:30px;" class="py-2 ">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
            </a>
        </nav>
        <a href='javascript:alert(Dados Cadastrais - Pessoas)'
            data-twe-toggle="modal"
            data-twe-target="#sigaBackdrop"
            data-twe-ripple-init
            data-twe-ripple-color="light"><!-- Botão que abre o modal Cadastrar-->
            <div class="divTitulo">Busca Pessoa - Dados Cadastrais</div>
        </a>

        <table id='listagem' style="width:96%;">
            <thead>
                <tr>
                    <th data-priority="1" class="bck01" style="width:60%; text-align:center;"> Nome    </th>
                    <th class="bck01 esconde470" style="text-align:right;"> CPF / CNPJ  </th>
                </tr>
            </thead>

            @foreach($pessoas as $pessoa)
                <tr>
                    <td id="_nm" name="_nm" class="registro" style="width:60%; text-align:left;">
                        <a href="cadastros/pessoas/selecionapessoa/{{ $pessoa->id }}"> {{ substr($pessoa->nome,0,35) }} </a>
                    </td>

                    <td id="_cpfcnpj" name="_cpfcnpj" class = "esconde470" style="text-align:right;">
                        <a href="cadastros/pessoas/selecionapessoa/{{ $pessoa->id }}">  {{ $pessoa->cpf_cnpj }} </a>
                    </td>
                </tr>
            @endforeach

        </table>

        <!----------------------------- Modal --------------------------------->


</center>
<!--------------------------------------------------------------------->
@endsection

<script type="module">
            $(document).ready(function(){
                $('#listagem').DataTable({
                    paging: true,
                    scrollCollapse: true,
                    responsive: true,
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
                            { data: 'nome'    }
                            , { data: 'cpf_cnpj'}
                    ],
                    columnDefs: [
                              { targets: [0], orderData: [0, 1] }
                            , { targets: [1], orderData: [1, 0] }
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
                        url: "{{ route('pesquisar') }}",
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
                    var rota = '/desenv/burgopaulista.com/web/public/'+'dashboard/cadastros/pessoas/editar/' + id + '/estados';

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
                /*    var rgIe = $(this).val();
                    var regex = /^[0-9a-zA-Z]{10,20}$/; // Exemplo: 10 a 20 caracteres alfanuméricos

                    if (!regex.test(rgIe)) {
                        alert("RG/Inscrição Estadual inválido. Por favor, verifique o formato.");
                        $(this).val('');

                    }*/
                });

                $("#dt_nascimento").keyup(capturarValorData);

            });


</script>
