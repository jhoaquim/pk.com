@extends('../layouts.siga')
<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }
</style>
@section('content')
<section class="py-10">
    <div class="container mx-auto">
        <div class="relative mb-8">
            <h1 class="divTitulo text-3xl font-bold text-center">Mostrar Registro</h1>
            <a href="javascript:history.back()" >
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded"
                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); padding-left:10px; padding-right:10px;">
                    &times;
                </button>
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6" x-data="{ tab: 'dados' }">
            <!-- Menu Tabs -->
            <div class="flex justify-center mb-6 space-x-4">
                <button @click="tab = 'dados'" :class="{'bg-blue-500 text-white': tab === 'dados', 'bg-gray-200': tab !== 'dados'}" class="px-4 py-2 rounded shadow">
                    D a d o s
                </button>
                <button @click="tab = 'endereco'" :class="{'bg-blue-500 text-white': tab === 'endereco', 'bg-gray-200': tab !== 'endereco'}" class="px-4 py-2 rounded shadow">
                    E n d e r e ço
                </button>
            </div>

            <!-- Formulário -->
            <form action="{{ route('pessoas.atualizar', $pessoas->id) }}" method='post' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $pessoas->id }}">

                <!-- Aba Dados -->
                <div x-show="tab === 'dados'" x-transition>
                    @include('partials.editar-pessoa-dados', ['pessoas' => $pessoas])
                </div>

                <!-- Aba Endereço -->
                <div x-show="tab === 'endereco'" x-transition>
                    @include('partials.editar-pessoa-endereco', ['pessoas' => $pessoas])
                </div>

            </form>
            <center style="padding-top:10px;" class='reg'>PRETTUS KLAN&nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
        </div>
    </di>
</section>
@endsection
