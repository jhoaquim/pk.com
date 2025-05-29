@extends('../layouts.siga')
<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }
</style>
@section('content')
<section x-data="{ tab: 'dados' }" class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow mt-10" style="width:95%">

    <div class="relative mb-6">
        <h1 class="divTitulo text-3xl font-bold text-center">Registro Processo</h1>
        <a href="javascript:history.back()">
            <button id="fechar" class="absolute bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" style="right:10px;">
                &times;
            </button>
        </a>
    </div>

    <div class="flex border-b border-gray-200 mb-6">
        <button @click="tab = 'dados'" :class="{'bg-blue-500 text-white': tab === 'dados', 'bg-gray-200': tab !== 'dados'}" class="px-4 py-2 rounded shadow">
            D a d o s
        </button>
        <button @click="tab = 'processo'" :class="{'bg-blue-500 text-white': tab === 'endereco', 'bg-gray-200': tab !== 'endereco'}" class="px-4 py-2 rounded shadow">
            P r o c e s s o
        </button>
    </div>

    <!-- Abas com transição suave -->
    <div>
        <!-- Aba Dados -->
        <div x-show="tab === 'dados'"
             x-transition:enter="transition-opacity duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><strong>Processo Id:</strong> {{ $processos->id }}</div>
                <div><strong>Parte Requerente:</strong> {{ substr($processos->nome,0, 30) }}</div>
                <div><strong>Parte Requerida:</strong> Requerido</div>
                <div><strong>Número:</strong> {{ $processos->referente }}</div>
                <div><strong>CPF:</strong>{{ \App\Helpers\DadosPessoais::maskCpfCnpj($processos->cpf_cnpj) }}</div>
                <div><strong>RG:</strong>{{ \App\Helpers\DadosPessoais::maskRg($processos->rg_ie) }}</div>
                <div><strong>NIS:</strong>{{ \App\Helpers\DadosPessoais::maskNis($processos->pis) }}</div>
                <div><strong>Email:</strong> {{ $processos->email }}</div>
                <div><strong>Data Registro:</strong> {{ dateFormatDatabaseScreen($processos->created_at, 'screen') }}</div>
                <div><strong>Última Movimentação:</strong> {{ dateFormatDatabaseScreen($processos->updated_at, 'screen') }}</div>
            </div>
        </div>

        <!-- Aba Processo -->
        <div x-show="tab === 'processo'"
             x-transition:enter="transition-opacity duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="mt-6">
            <object data="{{ asset('pdfs/estatuto_abcd.pdf') }}" type="application/pdf" width="100%" height="540px">
                <p>Seu navegador não suporta a visualização de PDFs.</p>
            </object>
        </div>
    </div>

    <div class="mt-6 text-center text-sm text-gray-500">
        PRETTUSKLAN {{ \App\Classes\Datas::dataHora() }}
    </div>
</section>
@endsection
