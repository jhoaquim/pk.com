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
    <center style="padding-top:0px">
    <section class="borda1" style="width:90%; max-width:600px;">
        <nav style="padding-right:30px;" class="py-2 ">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
            </a>
        </nav>

        <a href=''
            data-twe-toggle="modal"
            data-twe-target="#sigaBackdrop"
            data-twe-ripple-init
            data-twe-ripple-color="light"><!-- Botão que abre o modal Cadastrar-->
            <div class="divTitulo">Lista Requerentes</div>
        </a>

        <table id='listagem' style="width:98%;">
            <thead>
                <tr>
                    <th data-priority="0" class="bck01" style="width:5%; text-align:center;"> PESSOA </th>
                    <th data-priority="1" class="bck01" style="text-align:center;"> NOME    </th>
                    <th data-priority="2" class="bck01" style="text-align:cener;"> CPF / CNPJ  </th>
                </tr>
            </thead>

            @foreach($pessoas as $pessoa)
                <tr>
                    <td id="_avatar" name="_avatar" class="registro" style="width:5%; text-align:center;">
                        <a href="requerentes/{{ $pessoa->id }}"><img class='img-avatar-xs' src="{{ asset('avatars/'.$pessoa->avatar) }}"></a>
                    </td>

                    <td id="_nm" name="_nm" class="registro nome" style="text-align:left;">
                        <a href="requerentes/{{ $pessoa->id }}"> {{ substr($pessoa->nome,0,39) }} </a>
                    </td>

                    <td id="_cpfcnpj" name="_cpfcnpj" class = style="text-align:left;">
                        <a href="requerentes/{{ $pessoa->id }}">  {{ $pessoa->cpf_cnpj }} </a>
                    </td>
                </tr>
            @endforeach

        </table>
        <BR>

@endsection

<script type="module">
    const caminhoPublic = '<?php echo env('CAMINHO_PUBLIC'); ?>';
            $(document).ready(function(){
                $('#listagem').DataTable({
                    paging: true,
                    scrollCollapse: true,
                    responsive: true,
                    pagingType: 'full_numbers',
                        language:{
                        url:"../lang/pt-br.json",
                        search: "Busca Requerente:",
                        paginate: {
                            first: '<< Primeiro',
                            previous: '‹ Voltar',
                            next: 'Próximo ›',
                            last: 'Último >>',
                        },
                    },
                    table: '#listagem',
                    columns: [
                              { data: 'avatar'  }
                            , { data: 'nome'    }
                            , { data: 'cpf_cnpj'}

                    ],
                    columnDefs: [
                              { targets: [0], orderData: [0, 1] }
                            , { targets: [1], orderData: [1, 0] }
                            , { targets: [2], orderData: [2, 0] }

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
            });

</script>
