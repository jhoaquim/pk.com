@extends('../layouts.siga')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }
</style>
@section('content')

<center style="padding-top:0px">
    <section class="borda1" style="width:90%; max-width:600px;">
        <nav style="padding-right:30px;" class="py-2">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
            </a>
        </nav>

        <div class="divTitulo">Requerente</div>

        <form id="dados-requerente" action="{{ route('construir', $pessoas->id) }}" method='POST' enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="{{ $pessoas->id }}">

            <hr style="padding-bottom:5px;">

            <button id="btn_seleciona" name="selecionarequerente" type="button"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                &nbsp;Seleciona&nbsp;
            </button>
            <button id="cancela"
                data-twe-modal-dismiss
                data-twe-ripple-init
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                onclick="history.back()">
                Cancela
            </button>

            <hr style="padding-top:5px; padding-bottom:5px;">

            <div class="space-y-4" style="width:80%">
                <div>
                    <label class="block font-semibold"></label>
                    <img class="img-image-xs sombra" src="{{ asset("avatars/".$pessoas->avatar) }}" class="h-32 w-32 object-cover rounded shadow">
                </div>

                <div class="labelesquerda">
                    <input type="checkbox" name="status" value="true" {{ $pessoas->status === 1 ? 'checked' : '' }} class="h-5 w-5" readonly>
                    <label class="font-semibold">Ativo</label>
                    <div style="padding-left:15%;" id="mensagem"></div>
                </div>

                <div>
                    <label class="labelesquerda">Nome</label>
                    <input type="text" id="requerente" name="requerente" value="{{ $pessoas->nome }}" class="w-full border rounded px-3 py-2" readonly>
                </div>

                <div>
                    <label class="labelesquerda">{{ $pessoas->pessoa_tp === 'F' ? 'CPF' : 'CNPJ' }}</label>
                    <input type="text" name="cpf_cnpj" value="{{ $pessoas->cpf_cnpj }}" class="w-full border rounded px-3 py-2" readonly>
                </div>

                <div>
                    <label class="labelesquerda">{{ $pessoas->pessoa_tp === 'F' ? 'RG' : 'Inscrição Estadual' }}</label>
                    <input type="text" name="rg_ie" value="{{ $pessoas->rg_ie }}" class="w-full border rounded px-3 py-2" readonly>
                </div>

                @if ($pessoas->pessoa_tp === "F")
                <div>
                    <label class="labelesquerda">NIS</label>
                    <input type="text" name="nis" value="{{ $pessoas->pis }}" class="w-full border rounded px-3 py-2" readonly>
                </div>
                @endif

                <div>
                    <label class="labelesquerda">Tipo Pessoa</label>
                    <div class="flex space-x-4">
                        <label class="labelesquerda">
                            <input type="radio" name="pessoa_tp" value="F" {{ $pessoas->pessoa_tp === 'F' ? 'checked' : '' }} class="mr-2" readonly>
                            Física
                        </label>
                        <label class="labelesquerda">
                            <input type="radio" name="pessoa_tp" value="J" {{ $pessoas->pessoa_tp === 'J' ? 'checked' : '' }} class="mr-2" readonly>
                            Jurídica
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold">Observação</label>
                    <textarea name="obs" rows="6" class="w-full border rounded px-3 py-2" readonly>{{ $pessoas->obs }}</textarea>
                </div>

                <div>
                    <label class="labelesquerda">Último Acesso</label>
                    <input type="text" value="{{ dateFormatDatabaseScreen($pessoas->last_used_at, 'screen') }}" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
                </div>
            </div>
        </form>

        <div class="carregando" style="display:none;">Processando...</div>
        <center style="padding-top:10px;" class='reg'>PRETTUS KLAN&nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
    </section>
</center>
@endsection

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

<script>
const caminhoPublic = '<?php echo env('CAMINHO_PUBLIC'); ?>';

$(document).ready(function() {

    // Preencher automaticamente se localStorage tiver valores
    //let reqId = localStorage.getItem('requerente_id');
    //let reqNome = localStorage.getItem('requerente_nome');
    let reqId   = sessionStorage.getItem('requerente_id');
    let reqNome = sessionStorage.getItem('requerente_nome');

    if (reqId && reqNome) {
        $('#requerente').val(reqNome);
        $('#id').val(reqId);
        console.log('Campos preenchidos automaticamente:', reqId, reqNome);

        sessionStorage.removeItem('requerente_id');
        sessionStorage.removeItem('requerente_nome');
    }

    $(document).on('click', '#btn_seleciona', function(e) {
        e.preventDefault();
        var rota = 'dashboard/cadastros/requerentes/';
        var id = $('input[name="id"]').val();
        var nome = $('input[name="requerente"]').val();
        let url = `${caminhoPublic}${rota}${id}/selecionarequerente`;

        if (!id || !nome) {
            setTimeout(function() {
                $('#mensagem').html('<p style="color:red;">campo(s) prenchimento(s) incorreto(s).</p>');
            }, 5000);
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn_seleciona').prop('disabled', true);
        $('.carregando').show();

        $.ajax({
            url: url,
            method: 'GET',
            data: { id, nome },
            success: function(response) {
                sessionStorage.setItem('requerente_id', id);
                sessionStorage.setItem('requerente_nome', nome);

                $('#mensagem').html('<p style="color:green;">' + response.message + '</p>');

                setTimeout(function() {
                    history.go(-2);
                }, 500);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let msg = '<ul style="color:red;">';
                    $.each(errors, function(key, value) {
                        msg += '<li>' + value[0] + '</li>';
                    });
                    msg += '</ul>';
                    $('#mensagem').html(msg);
                } else {
                    $('#mensagem').html('<p style="color:red;">Erro ao processar a requisição.</p>');
                }
            },
            complete: function() {
                setTimeout(function() {
                    $('#mensagem').html('');
                }, 5000);
            }
        });
    });
});
</script>
