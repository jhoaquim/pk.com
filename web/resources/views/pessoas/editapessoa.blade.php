@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }
</style>

<div class="carregando"><div class="spinner"></div> </div>

@section('content')
<section class="py-10">
    <div class="container mx-auto">
        <h1 class="divTitulo text-3xl font-bold text-center mb-8">Edita Registro</h1>

        <a href="javascript:history.back()" class="inline-block mb-6">
           <button style="padding-right:10px;padding-left:10px;" class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">&times;</button>
        </a>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form name='editar' action="{{ route('pessoas.atualizar', $pessoas->id) }}" method='post' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $pessoas->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-semibold mb-2">Registro</label>
                        <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" value="{{ $pessoas->id }}" disabled>
                    </div>

                    <div>
                        <label for="nome" class="block font-semibold mb-2">Pessoa Nome</label>
                        <input id="nome" name="nome" value="{{ $pessoas->nome }}" type="text" class="w-full border rounded px-3 py-2" placeholder="Nome Completo">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block font-semibold mb-2"></label>
                            <img class='img-image-xs sombra' src="{{ asset("avatars/".$pessoas->avatar) }}" class="h-32 w-32 object-cover rounded shadow">
                        </div>
<!!---CPF---------------------------------------------------------------------------------------------->
<label class="block font-semibold mb-2">
    {{ $pessoas->pessoa_tp === 'F' ? 'CPF' : 'CNPJ' }}
</label>

<div x-data="{ showDoc: false }" class="relative w-full">
    <input id="cpf_cnpj" name="cpf_cnpj"
           type="text"
           :value="showDoc ? '{{ $pessoas->cpf_cnpj }}' : '{{ \App\Helpers\DadosPessoais::maskCpfCnpj($pessoas->cpf_cnpj) }}'"
           class="mask-cpf border rounded px-3 py-[10px] pr-10" style="width: 90%;"
           readonly>

    <button type="button"
            @click="showDoc = !showDoc"
            class="absolute right-3 text-gray-500 hover:text-blue-600 focus:outline-none" style="top:-18px;">
        <template x-if="!showDoc">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                      -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </template>
        <template x-if="showDoc">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19
                      c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.658-2.925
                      M6.354 6.354A9.965 9.965 0 0112 5
                      c4.477 0 8.268 2.943 9.542 7
                      a9.96 9.96 0 01-4.174 5.192
                      M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3l18 18"/>
            </svg>
        </template>
    </button>
</div>
<!----------------------------------------------------->
                        <div>
                            <label class="block font-semibold mb-2">{{ $pessoas->pessoa_tp === 'F' ? 'RG' : 'Inscrição Estadual' }}</label>
                            <div x-data="{ showDoc: false }" class="relative w-full">
                                <input id="rg_ie" name="rg_ie"
                                    type="text"
                                    :value="showDoc ? '{{ $pessoas->rg_ie }}' : '{{ \App\Helpers\DadosPessoais::maskRg($pessoas->rg_ie) }}'"
                                    class="mask-cpf border rounded px-3 py-[10px] pr-10" style="width: 90%;"
                                    readonly>

                                <button type="button"
                                        @click="showDoc = !showDoc"
                                        class="absolute right-3 text-gray-500 hover:text-blue-600 focus:outline-none" style="top:-18px;">
                                    <template x-if="!showDoc">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                                                -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </template>
                                    <template x-if="showDoc">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19
                                                c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.658-2.925
                                                M6.354 6.354A9.965 9.965 0 0112 5
                                                c4.477 0 8.268 2.943 9.542 7
                                                a9.96 9.96 0 01-4.174 5.192
                                                M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3l18 18"/>
                                        </svg>
                                    </template>
                                </button>
                            </div>
                        </div>

                        @if ($pessoas->pessoa_tp === "F")
                        <div>
                            <label class="block font-semibold mb-2">NIS</label>
                            <div x-data="{ showDoc: false }" class="relative w-full">
                                <input id="rg_ie" name="rg_ie"
                                    type="text"
                                    :value="showDoc ? '{{ $pessoas->pis }}' : '{{ \App\Helpers\DadosPessoais::maskNis($pessoas->pis) }}'"
                                    class="mask-cpf border rounded px-3 py-[10px] pr-10" style="width: 90%;"
                                    readonly>

                                <button type="button"
                                        @click="showDoc = !showDoc"
                                        class="absolute right-3 text-gray-500 hover:text-blue-600 focus:outline-none" style="top:-18px;">
                                    <template x-if="!showDoc">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                                                -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </template>
                                    <template x-if="showDoc">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19
                                                c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.658-2.925
                                                M6.354 6.354A9.965 9.965 0 0112 5
                                                c4.477 0 8.268 2.943 9.542 7
                                                a9.96 9.96 0 01-4.174 5.192
                                                M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3l18 18"/>
                                        </svg>
                                    </template>
                                </button>
                            </div>
                        </div>
                        @endif

                        <div>
                            <label class="block font-semibold mb-2">Tipo Pessoa</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="pessoa_tp" value="F" {{ $pessoas->pessoa_tp === 'F' ? 'checked' : '' }} class="mr-2">
                                    Física
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="pessoa_tp" value="J" {{ $pessoas->pessoa_tp === 'J' ? 'checked' : '' }} class="mr-2">
                                    Jurídica
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block font-semibold mb-2">Observação</label>
                            <textarea id="obs" name="obs" rows="6" class="w-full border rounded px-3 py-2">{{ $pessoas->obs }}</textarea>
                        </div>

                        <div>
                            <label class="block font-semibold mb-2">Último Acesso</label>
                            <input id="last_used_at" name="last_used_at" value="{{ dateFormatDatabaseScreen($pessoas->last_used_at, 'screen') }}" type="text" disabled class="w-full border rounded px-3 py-2 bg-gray-100">
                        </div>

                        <div class="flex items-center space-x-2">
                            <input id="status" name="status" type="checkbox" value="true" @if($pessoas->status === 1) checked @endif class="h-5 w-5">
                            <label for="status" class="font-semibold">&nbsp;&nbsp;Ativo</label>
                        </div>
                    </div>
                </div>

                <h2 class="text-2xl font-bold mb-4">Endereço & Contato</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block font-semibold mb-2">E-mail</label>
                            <input id="email" name="email" value="{{ $pessoas->email }}" type="email" class="w-full border rounded px-3 py-2" placeholder="e-mail@exemplo.com.br">
                        </div>

                        <div>
                            <label for="endereco" class="block font-semibold mb-2">Endereço</label>
                            <input id="endereco" name="endereco" value="{{ $pessoas->endereco }}" type="text" class="w-full border rounded px-3 py-2" placeholder="Rua, Av, etc">
                        </div>

                        <div class="flex space-x-2">
                            <input id="bairro" name="bairro" value="{{ $pessoas->bairro }}" type="text" class="w-full border rounded px-3 py-2" placeholder="Bairro">
                            <input id="nr" name="nr" value="{{ $pessoas->nr }}" type="text" class="w-20 border rounded px-3 py-2" placeholder="Nr">
                        </div>

                        <div class="flex space-x-2">
                            <input id="complemento" name="complemento" value="{{ $pessoas->complemento }}" type="text" class="w-full border rounded px-3 py-2" placeholder="Complemento">
                            <input id="cep" name="cep" value="{{ $pessoas->cep }}" type="text" class="w-32 border rounded px-3 py-2" placeholder="CEP">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="dt_nascimento" class="block font-semibold mb-2">
                                {{ $pessoas->pessoa_tp === 'F' ? 'Data de Nascimento' : 'Data de Registro' }}
                            </label>
                            <input id="dt_nascimento" name="dt_nascimento" value="{{ dateFormatDatabaseScreen($pessoas->dt_nascimento, 'screen') }}" type="text" class="w-full border rounded px-3 py-2">
                        </div>

                        <div class="flex space-x-2">
                            <div class="w-1/2">
                                <label class="block font-semibold mb-2">Estado</label>
                                <select id="estado" name="estado" class="w-full border rounded px-3 py-2">
                                    <option value="{{ $pessoas->esta_ibge }}">{{ $pessoas->esta_uf }}</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label class="block font-semibold mb-2">Cidade</label>
                                <select id="municipio" name="municipio" class="w-full border rounded px-3 py-2" disabled>
                                    <option value="{{ $pessoas->muni_ibge }}">{{ $pessoas->muni_nm }}</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="associado" class="block font-semibold mb-2">Associado</label>
                            <select id="associado" name="associado" class="w-full border rounded px-3 py-2">
                                <option value="0" {{ $pessoas->pessoa === 0 ? 'selected' : '' }}>CLIENTE</option>
                                <option value="1" {{ $pessoas->pessoa === 1 ? 'selected' : '' }}>ADVOGADO</option>
                                <option value="2" {{ $pessoas->pessoa === 2 ? 'selected' : '' }}>CONVIDADO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <center style="padding-top:10px;" class='reg'>PRETTUS KLAN&nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
</section>
<script src="{{ asset('js/inputMasks.js') }}"></script>
<script type="module">

        const caminhoPublic = '<?php echo env('CAMINHO_PUBLIC'); ?>';

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

            $('#estado').click(function(){
                var rota = caminhoPublic+'dashboard/cadastros/pessoas/editar/' + id + '/estados';
                var id = $('#esta_ibge').val(); //var id = $('#estado').val();
                var selectElement = document.getElementById('estado'); // ID do seu elemento <select>
                var selectedIndex = selectElement.selectedIndex;
                var selectedOption = selectElement.options[selectedIndex];

                $.get(rota, function(r) {
                    var k = Object.keys(r.estados);
                    var options     ='';
                    for (var i = 0; i < k.length; i++) {
                        var selected = r.estados[i].esta_ibge === $('#estado').val() ? 'selected="selected"' : '';
                            options += '<option value=' + r.estados[i].esta_ibge + ' '+ selected +'>' + r.estados[i].esta_uf + '</option>';
                    }
                    $('#estado').append(options);
                });
                if (selectedOption) {
                    var selectedValue = selectedOption.value;
                    console.log(`Item selecionado: ${selectedValue}`);
                    $("#estado").on("change", function() {
                        var selectElement = document.getElementById('estado'); // ID do seu elemento <select>
                        var selectedIndex = selectElement.selectedIndex;
                        var selectedOption = selectElement.options[selectedIndex];
                        var id = selectedOption.value;
                        var rota = caminhoPublic+'dashboard/cadastros/pessoas/editar/' + id + '/municipios';

                        $('.carregando').addClass('show');
                        document.querySelector('#municipio').removeAttribute("disabled");

                        $.get(rota, function(r) {
                            var k = Object.keys(r.municipios);
                            var options     ='';

                            for (var i = 0; i < k.length; i++) {
                                var selected = r.municipios[i].muni_ibge === $('#municipio').val() ? 'selected' : '';
                            options += '<option value=' + r.municipios[i].muni_ibge + ' '  + '>' + r.municipios[i].muni_nm + '</option>';
                            }
                            $('#municipio').empty();
                            $('#municipio').append(options);
                        });
                    });


                } else {
                    console.log('Nenhum item selecionado.');
                }

            });

        });

        // Função para mostrar o carregamento
        function showLoading() {
            $('.carregando').addClass('show');
        }

        // Função para esconder o carregamento
        function hideLoading() {
            $('.carregando').removeClass('show');
        }

</script>
@endsection
