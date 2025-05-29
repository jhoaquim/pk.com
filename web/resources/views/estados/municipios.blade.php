@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }
</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')


    <nav class="py-4 ">
        <a href="javascript:history.back()">
            <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">&times;</button>
        </a>
    </nav>
    <!-- Botão que abre o modal -->
    <center>
    <button
        type="button"
        data-twe-toggle="modal"
        data-twe-target="#sigaBackdrop"
        data-twe-ripple-init
        data-twe-ripple-color="light">
        <div class="divTitulo">Lista de Pessoas</div>
    </button>
    </center>

    <section class="centraliza">
        <table id='listagem' style="width:100%;">
            <thead>
                <tr>
                    <th data-priority="0" class="bck01 campo0" style="width:6%; text-align:center;"> Estado IBGE </th>
                    <th data-priority="1" class="bck01 campo0" style="width:6%; text-align:center;"> Estado </th>
                    <th data-priority="2" class="bck01 campo0 esconde470" style="width:20%; text-align:left;"> Nome </th>
                    <th data-priority="3" class="bck01 campo0 esconde470" style="width:6%; text-align:center;"> ICMs</th>
                    <th class="bck01 campo3 esconde470" style="width:50%; text-align:center;"> Cidade </th>
                    <th class="bck01 campo4" style="text-align:center;"> Código da Cidade  </th>

                </tr>
            </thead>

                <!-- <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Processo</th>
                    <th>Status</th>
                </tr>
                </tfoot> -->

            @foreach($municipios as $municipio)
                <tr>
                    <td id="esta_ibge" name="esta_ibge" class="registro" style="width:6%; text-align:center;">
                        <a href="javascript:alert('campo Estado IBGE')">{{ $municipio->esta_ibge }}</a>
                    </td>

                    <td id="esta_uf" name="esta_uf" class="registro" style="width:6%; text-align:center;">
                        <a href="javascript:alert('campo Estado Sigla')">{{ $municipio->esta_uf }}</a>
                    </td>

                    <td id="esta_nm" name="esta_nm" class = "esconde470" style="width:20%; text-align:center;">
                        <a href="#"> {{ $municipio->esta_nm }} </a>
                    </td>

                    <td id="esta_icms" name="esta_icms" class = "esconde470" style="width:6%; text-align:center;">
                        <a href="#"> {{ $municipio->esta_aliq_icms }} </a>
                    </td>

                    <td id="muni_nm" name="muni_nm" class = "esconde470 esconde360" style="width:50%; text-align:left;">
                        <a href="javascript:alert('campo Cidade')">  {{ $municipio->muni_nm }} </a>
                    </td>

                    <td id="muni_ibge" name="muni_ibge" class="registro" style="width:10%; text-align:left;">
                        <a href="#"> {{ $municipio->muni_ibge }} </a>
                    </td>

                </tr>
            @endforeach

        </tables>
        <!----------------------------- Modal --------------------------------->
        <div data-twe-modal-init
            class="fixed top-5 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
            id="sigaBackdrop"
            data-twe-backdrop="static"
            data-twe-keyboard="false"
            tabindex="-1"
            aria-labelledby="sigaBackdropLabel"
            aria-hidden="true"
        >
            <div data-twe-modal-dialog-ref class="dark:bg-black pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">
                        <!--Título do Modal -->
                        <h5 id="tituloModal" class="text-xl font-bold leading-normal text-surface dark:text-blue">
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
                        <button id="demo"
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
        <!--------------------------------------------------------------------->
        <script type="module">

            $(document).ready(function(){
                $('#listagem').DataTable({
                    processing: true,
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
                            last: 'Ultimo »',
                        },
                    },
                    table: '#listagem',
                    columns: [
                              { data: 'esta_ibge' }
                            , { data: 'esta_uf'   }
                            , { data: 'esta_nm'   }
                            , { data: 'esta_aliq_icms' }
                            , { data: 'muni_nm'   }
                            , { data: 'muni_ibge' }

                    ],
                    columnDefs: [
                              { targets: [0], orderData: [0, 1] }
                            , { targets: [1], orderData: [1, 0] }
                            , { targets: [2], orderData: [2, 0] }
                            , { targets: [3], orderData: [3, 0] }
                            , { targets: [4], orderData: [4, 0] }
                            , { targets: [5], orderData: [4, 0] }

                    ],
                    dom: 'Bfrtip',
                    select: true,
                    buttons: ['colvis']
                });

            });

        </script>

@endsection
