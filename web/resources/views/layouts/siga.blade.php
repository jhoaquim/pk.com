<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" />

        <!-- Bootstrap CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="//unpkg.com/alpinejs" defer></script>
        <title>PrettusKlan Siga</title>
    </head>
    <nav class="bg-gray-800 py-4">

            <div>
                <!-- Logo ou título -->
                <a href="{{ asset('/') }}" class="text-white" style="padding-right:20px;">
                    <center><img width='50px;' src="{{ asset('imgs/sistema/pk_siga_branco.png') }}"/>
                        PrettusKlan Computatrum.Ius
                    </center>
                </a>
            </div>

    </nav>
    <body>
        @yield('content')
    </body>
</html>
