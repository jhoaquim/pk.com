@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }
</style>

@section('content')
    <nav class="py-4">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">&times;</button>
            </a>
    </nav>

    <section>
        <center>

        <div class="divTitulo">Adicionar Pessoa</div>

        </center>

    </section>

@endsection
