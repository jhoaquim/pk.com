<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" />

        <!-- Bootstrap CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>Pk.C.Siga</title>

    </head>
    <nav class="bg-gray-800 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <!-- Logo ou título -->
                <a href="construcao" class="text-white text-md font-bold">
                    <center><img width='50px;' src="{{ asset('imgs/sistema/pk_siga_branco.png') }}"/>
                        PrettusKlan Computatrum.Ius
                    </center>
                </a>
            </div>

            <div>
                <!-- Links do menu -->
                <ul class="flex space-x-4">
                    <li><a href="construcao" class="text-white" style="padding-right:20px;">Serviços</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <body>


           @yield('content')


    </body>
</html>
