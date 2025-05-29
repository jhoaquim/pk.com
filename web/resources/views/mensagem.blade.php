@extends('../layouts.siga')

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" />

        <style type="text/css">
            @font-face {
                font-family: 'vila madalena';
                font-size  : 18px;
                src        : url("{{ asset('/fonts/vila madalena.otf') }}");
            }
            .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh; /* Ajuste a altura conforme necessário */
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <nav class="py-4">
            <a href="javascript:history.back()">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">&times;</button>
            </a>
    </nav>

    <section>
        <center>
            <div class="divTitulo">Mensagem..!</div><br>
            <a href="javascript:alert('mensagerias !')">
                <img id="img1" width='50' src="{{ asset('imgs/sistema/pk_siga.png') }}">
            </a>
            <font class="alert alert-danger container" role="alert" face="arial" size="5" color="#000" style="padding-top:350px">
                <div>{{ $mensagem }} {{ \App\Classes\Datas::dataHora() }}</div>
            </font>
        </center>
    </section>

@endsection
