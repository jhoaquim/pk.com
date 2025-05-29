<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('imgs/icones/favicon.ico') }}" type="image/x-icon">
        <style type="text/css">
            @font-face {
                font-family: 'vila madalena';
                font-size  : 18px;
                src        : url("{{ asset('/fonts/vila madalena.otf') }}");
            }

            #martelo.paused {
                animation-play-state: paused;
            }

        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>PrettusKlan Siga</title>
    </head>


    <nav style="padding-right:60px;" class="py-4" style="padding:10px;">
        <a href="{{ asset('/') }}">
            <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
        </a>
    </nav>
    <center>

    <div class="divTitulo"></div>
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2" style: padding=5px;></div>

            @if (Route::has('login'))
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <!-- Botão do usuário -->
                <button id="usuario"
                        type="button"
                        @click="open = !open"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium
                            rounded-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none
                            focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 transition"
                        aria-haspopup="true"
                        aria-expanded="false"
                        aria-controls="dropdown-menu"
                        role="button">
                    {{ Auth::user()->name }}
                    <svg class="ms-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <div x-show="open"
                    @click.away="open = false"
                    x-transition
                    id="dropdown-menu"
                    class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white
                            shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu"
                    aria-labelledby="usuario">
                    <div class="py-1">
                        <a href="{{ route('profile.show') }}"
                        class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100"
                        role="menuitem">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-300 hover:bg-gray-100"
                                    role="menuitem">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </header>

        <main class="mt-0" style="margin-top:-40px">
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8" style="padding-left:5%">

                <div id="docs-card" style="width:95%"
                    class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6
                    shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                    transition duration-300 hover:text-black/70 hover:ring-black/20
                    focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10">
                    <div id="screenshot-container" class="relative flex w-3/4 flex-2 items-stretch">
                    <img src="{{ asset('imgs/sistema/pk_siga_branco.png') }}"
                        alt="sistema integrado gerenciamento administrativo"
                        class="aspect-video flex-1 rounded-[10px] object-top object-cover -left-16 h-40
                        w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white
                        drop-shadow-[0px_4px_34px_rgba(0,0,0,0.09)]"
                        onerror="
                            document.getElementById('screenshot-container').classList.add('!hidden');
                            document.getElementById('docs-card').classList.add('!row-span-1');
                            document.getElementById('docs-card-content').classList.add('!flex-row');
                            document.getElementById('background').classList.add('!hidden');"/>

            </div>

            <div style="width:98%" class="flex items-start gap-4 rounded-lg bg-white p-6
                        shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                        transition duration-300 hover:text-black/70 hover:ring-black/20
                        focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10">
                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                    <a  href="dashboard/processos" style="width:98%" class="flex items-start gap-4 rounded-lg
                        bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                        transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none
                        focus-visible:ring-[#FF2D20] lg:pb-10" >
                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                            <img src="{{ asset('imgs/juridico/martelo.gif') }}">
                        </div>
                        <h2 class="text-xl font-semibold text-black">Processos</h2>
                        <p class="mt-2 text-sm/relaxed">Processos Cadastrados no Sistema</p>
                        <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                    </a>
                </div>
            </div>
                </div>

                <a  href="dashboard/cadastros" style="width:90%"
                        class="flex items-start gap-4 rounded-lg bg-white p-6
                        shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                        transition duration-300 hover:text-black/70 hover:ring-black/20
                        focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"/>
                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                    <img src="{{ asset('imgs/sistema/ca.png') }}">
                </div>
                <div class="pt-3 sm:pt-5">
                    <h3 class="text-xl font-semibold text-black">Registros</h3>
                        <p class="mt-2 text-sm/relaxed">
                            Cadastros de Dados do Sitema.
                        </p>
                </div>
                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                </a>

                <a  href="dashboard/textos" style="width:90%"
                                class="flex items-start gap-4 rounded-lg bg-white p-6
                                shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                                transition duration-300 hover:text-black/70 hover:ring-black/20
                                focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">

                                    <img id="martelo" src="{{ asset('imgs/juridico/justica-01.png') }}">

                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black">Textos Jurídicos</h2>

                                    <p class="mt-2 text-sm/relaxed">
                                        Textos Jurídocos do Sistema
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                </a>

            <!--    <a  href="dashboard/financas" style="width:90%" -->
                    <a  href="dashboard/fincontri" style="width:90%"
                                class="flex items-start gap-4 rounded-lg bg-white p-6
                                shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]
                                transition duration-300 hover:text-black/70 hover:ring-black/20
                                focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">

                                <img id="att_logo" src="{{ asset('imgs/icones/img2.png') }}" style="max-width:90%">

                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black">Finanças, Contábil e Tributos</h2>

                                    <p class="mt-2 text-sm/relaxed">
                                        Cadastros Lançamentos
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                </a>

            </div>
        </main>

        <script type="module">
            $(document).ready(function(){
                const gif = document.getElementById('martelo');
                const button = document.getElementById('pauseButton');

                button.addEventListener('click', () => {
                    gif.classList.toggle('paused');
                    button.textContent = gif.classList.contains('paused') ? 'Retomar' : 'Pausar';
                });

	            $("#att_logo").click(function(){
                    $(this).toggleClass('rotate-image');
                });

                $(function() {
                    $('.toggle-button').click(function() {
                        $('.usuario-menu').toggleClass('show');
                    });
                });

            });

        </script>

    </section>
    </center>
</html>
<script src="{{ asset('js/alpine.js') }}" defer></script>
