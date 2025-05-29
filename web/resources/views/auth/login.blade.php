@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('e-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <!------------------------------------------------------------------>
            <div class="mt-4" x-data="{ show: false }">
                <x-label for="password" value="{{ __('Senha') }}" />
                <div class="relative">
                    <input  id="password" :type="show ? 'text' : 'password'"
                            name="password" required autocomplete="current-password"
                            class="flex-grow focus:outline-none"
                            style="width: 90%;" />

                    <button type="button"
                            @click="show = !show"
                            class="absolute inset-y-0 right-3 text-gray-500 hover:text-indigo-600"
                            style="top:-19px;">
                        <template x-if="!show">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5
                                        c4.477 0 8.268 2.943 9.542 7
                                        -1.274 4.057-5.065 7-9.542 7
                                        -4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </template>
                        <template x-if="show">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19
                                        c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.658-2.925
                                        M6.354 6.354A9.965 9.965 0 0112 5
                                        c4.477 0 8.268 2.943 9.542 7
                                        a9.96 9.96 0 01-4.174 5.192
                                        M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>
                            </svg>
                        </template>
                    </button>
                </div>
            </div>
            <!------------------------------------------------------------------>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('lembrar-me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua Senha?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Entrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script src="//unpkg.com/alpinejs" defer></script>
