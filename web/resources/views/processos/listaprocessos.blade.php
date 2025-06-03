@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }

</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <center>
    <section class="borda1" style="width:95%">
            <nav style="padding-right:20px;" class="py-2 ">
                <a href="{{ route('dashboard') }}">
                    <button id="fechar"
                        class="retorna bg-green-500 hover:bg-red-500
                        text-white font-bold py-4 px-4 rounded fechar"
                    >
                        &times;
                    </button>
                </a>
            </nav>

            <a href='' data-twe-toggle="modal" data-twe-target="#cadProcesso"
                data-twe-ripple-init  data-twe-ripple-color="light" class="divTitulo">
                Lista Processos - Cadastrar
            </a>

            <table id='listagem' style="width:98%;">
                <thead>
                    <tr>
                        <th data-priority="1" class="bck01 nome" style="text-align:center;"> Nome    </th>
                        <th data-priority="2" class="bck01" style="width:35%; text-align:center;"> Processo    </th>
                        <th data-priority="3" class="bck01 hide-on-small" style="text-align:left;">  última movimentação  </th>
                        <th data-priority="4" class="bck01 hide-on-small" style="text-align:center;"> status  </th>
                    </tr>
                </thead>

                @foreach($processos as $processo)
                    <tr>
                        <td id="nome" name="nome" class="registro nome" style="text-align:left;">
                        <a href="cadastros/processos/mostrar/{{ $processo->id }}"> {{ substr($processo->nome,0,39) }} </a>
                        </td>

                        <td id="processo" name="processo" class="registro" style="width:35%; text-align:center;">
                        <a href="cadastros/processos/mostrar/{{ $processo->id }}"> {{ substr($processo->referente,0,25) }} </a>
                        </td>

                        <td id="movimento" name="movimento" class = "hide-on-small" style="text-align:left;">
                        <a href="#"> {{ $processo->updated_at }} </a>
                        </td>

                        <td id="status" name="status" class = "hide-on-small" style="text-align:center;">
                                <a href="#">  {{ $processo->status }} </a>
                        </td>
                    </tr>
                @endforeach
            </table>

            <button id="novo"
                data-twe-toggle="modal"
                data-twe-target="#cadProcesso"
                data-twe-ripple-init
                data-twe-ripple-color="light"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                &nbsp;&nbsp;Novo&nbsp;&nbsp;
            </button>
    </div>

    <!----------------------------- Modal cadProcesso ------------------------------->
    <div id="cadProcesso"
        data-twe-modal-init draggable="true"
        class="fixed top-5 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
        data-twe-backdrop="static"
        data-twe-keyboard="false"
        tabindex="-1"
        aria-labelledby="sigaBackdropLabel"
        >
        <div data-twe-modal-dialog-ref class="dark:bg-black pointer-events-none
            relative w-[90%] translate-y-[-50px] opacity-0 transition-all duration-300
            ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md
                border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">
                    <!--Título do Modal -->
                    <h5 id="tituloModal" class="text-sm font-bold leading-normal text-surface dark:text-blue">
                        Cadastrar Processo
                    </h5>
                    <!----------- Botão Fechamento da cadProcesso ----------->
                    <button type="button" class="box-content rounded-none border-none hover:no-underline
                            focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none
                            dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                            data-twe-modal-dismiss aria-label="Close">
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
                <form name='editar' action="{{ route('construir') }}" class="sombra" method='post'  enctype="multipart/form-data">
                    <!----------------------------- Modal pessoaRequerente -------------------------->
                    <div
                        data-twe-modal-init
                        class="fixed top-5 z-[1060] hidden h-full w-full overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
                        id="listaRequerentes"
                        data-twe-backdrop="static"
                        data-twe-keyboard="false"
                        tabindex="-1"
                        aria-labelledby="listaRequerentesLabel" >
                        <div data-twe-modal-dialog-ref class="dark:bg-black pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">
                                <h5 id="listaRequerentesLabel" class="text-sm font-bold leading-normal text-surface dark:text-blue"> Processo - Pessoa Requerente</h5>
                                <button data-twe-modal-dismiss aria-label="Close" type="button" class="box-content rounded-none
                                        border-none hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none
                                        focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300
                                        dark:focus:text-neutral-300">
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
                            <table id='listaRequerentes' style="width:100%;">
                                <thead>
                                    <tr>
                                        <th data-priority="1" class="bck01 hide-on-small nome" style="width:60%; text-align:left;"> Nome   </th>
                                        <th data-priority="2" class="bck01 hide-on-small nome"  style="width:40%; text-align:center;"> CPF  </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------------->
                    <div style="padding:10px; border-radius: 1px;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">@method('PUT')
                        <input type="hidden" name="id" name="id">

                        <div class="rotulo"><b>Requerente:</b></div>
                        <input class="campo2" id="requerente" name="requerente"  value=""  type="text" placeholder="nome completo">

                        <div class="rotulo" style="padding-top:20px;"><b>Requerido:</b></div>
                        <input class="campo2" id="requerido" name="requerido"  value=""  type="text" placeholder="nome completo">

                        <div class="rotulo" style="padding-top:30px;"><b>data Registro</b></div>
                        <input class="campo1" id="dt_system" name="dt_system" value="" type="text" placeholder="Data Cadstro do Sistema">

                        <div class="rotulo" style="padding-top:20px;"><b>Estado(s) / Cidade(s)</b></div>
                            <select class="form-label campo3" id="estado" name="estado" class="required" >
                                <option value=""></option>
                            </select>

                            <select class="campo2" name="municipio" id="municipio" class="form-select" disabled="true">
                                <option value=""></option>
                            </select>

                        <div class="rotulo" style="padding-top:20px;"><b>Observação</b></div>
                            <textarea style="text-align: left;" rows="4" cols="100" maxlength="500"
                                class="campo" id="obs" name="obs" type="textarea" placeholder="Observação">
                            </textarea>

                        <button type="submit" id="salvar"
                            class="bg-green-500 hover:bg-green-700
                            text-white font-bold py-2 px-4 rounded">
                            Salvar
                        </button>
                        <button type="button"
                                data-twe-modal-dismiss
                                data-twe-ripple-init
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded fechar">
                                 <a href="">Fechar</a>
                        </button>

                </form>
            </div>
        </div>
    </div>
    </center>
@endsection

<script type="module">
    const caminhoPublic = '<?php echo env('CAMINHO_PUBLIC'); ?>';
    const elemento = document.getElementById('listaRequerentes');

    $(document).ready(function(){
            $(window).on('beforeunload', function(){
                console.log('Carrega Pagina Lista Processos');
                //limparSessionStorageRequerente();
                window.addEventListener("message", function(event) {
                    if (event.data.id && event.data.requerente) {
                        $('#id').val(event.data.id);
                        $('#requerente').val(event.data.requerente);
                    }
                });
            });
            
            $('#listagem').DataTable({
                        paging: true,
                        scrollCollapse: true,
                        responsive: true,
                        pagingType: 'full_numbers',
                        language:{
                            url:"../lang/pt-br.json",
                            search: "Busca processo:",
                            paginate: {
                                first: '<< Primeiro',
                                previous: '‹ Voltar',
                                next: 'Próximo ›',
                                last: 'Ultimo »',
                            },
                        },
                        table: '#listagem',
                        columns: [
                                  { data: 'nome'    }
                                , { data: 'referente' }
                                , { data: 'updated_at'}
                                , { data: 'status'   }
                        ],
                        columnDefs: [
                                  { targets: [0], orderData: [0, 1] }
                                , { targets: [1], orderData: [1, 0] }
                                , { targets: [2], orderData: [2, 0] }
                                , { targets: [3], orderData: [3, 0] }
                        ],
                        dom: 'Bfrtip',
                        select: true,
                        buttons: ['colvis']
                });

            $("#requerente").on('click', function(e) {
                e.preventDefault();
            /*    var requerenteUrl = "{{ route('pessoas.requerentes') }}";
                $.ajax({
                    url  : requerenteUrl,
                    type : 'GET',
                    dataType: "json",
                    async	: false,
                    data : { modulo : 1},
                    success : function(r) {
                        if (r.success) {
                            console.log(r.pessoas);
                            // aqui você pode popular a tabela ou preencher o campo
                        } else {
                            console.error('Erro ao buscar os requerentes');
                        }
                    }
                });
            */
                window.location.href = "{{ route('pessoas.requerentes') }}";
                //window.open("{{ route('pessoas.requerentes') }}", "Selecionar Requerente", "width=800,height=600");

            });

            $('.fechar').on('click', function() {
                //limparLocalStorageRequerente();
                limparSessionStorageRequerente();
            });

            $("#requerente").on('keyup', function() {
                $(this).val($(this).val().toUpperCase()); // Converte o texto para maiúsculo enquanto digita
                var nomeRequerente = $(this).val();
                var buscarUrl = "{{ route('processos.pessoa') }}"; // Sua rota para buscar pessoa

                $.ajax({
                    url: buscarUrl,
                    type: 'POST',
                    data: {
                    requerente: nomeRequerente,
                    _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                    $('#listaRequerentes tbody').empty();
                    $.each(data.pessoas, function(listar, Pessoas) {
                        var row = '<tr>' +
                        '<td class="registro nome hide-on-small" style="width:40%; text-align:left;"><a href="cadastros/pessoas/mostrar/' + Pessoas.id + '">' + Pessoas.nome.substring(0, 39) + '</a></td>' +
                        '<td class="hide-on-small" style="width:30%; text-align:center;"><a href="cadastros/pessoas/mostrar/' + Pessoas.id + '">' + Pessoas.referente.substring(0, 25) + '</a></td>' +
                        '</tr>';
                        $('#listaRequerentes tbody').append(row);
                    });
                    },
                    error: function(error) {
                        console.error('Erro na busca:', error);
                        alert('Erro ao buscar Pessoa Requerente.');
                    }
                });
            });

            $('#salvar').on('click',function(event) {
                event.preventDefault(); // Impede o envio padrão do formulário

                var form = $(this).closest('form');
                var url = form.attr('action');
                var data = form.serialize();
                $('carregamento').show();

                // Envia os dados do formulário via AJAX
                $.ajax({
                    url: url,
                    method: 'POST',  // Idealmente POST para salvar!
                    data: data,
                    success: function(response) {
                        console.log('Salvo com sucesso:', response);
                            limparSessionStorageRequerente();
                        $('.carregando').hide();

                        setTimeout(function(){
                            history.go(-1);
                        }, 500);
                    },
                    error: function(error) {
                        console.error('Erro ao enviar o formulário:', error);
                        $('.carregando').hide();
                    }
                });
            });

        });

    function limparLocalStorageRequerente() {
        localStorage.removeItem('requerente_id');
        localStorage.removeItem('requerente_nome');
        console.log('LocalStorage limpo: requerente_id e requerente_nome');
    }

    function limparSessionStorageRequerente() {
        sessionStorage.removeItem('requerente_id');
        sessionStorage.removeItem('requerente_nome');
        console.log('sessionStorage limpeza de Dados');
    }

    function getQueryParam(param) {
    let urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
    }
</script>

