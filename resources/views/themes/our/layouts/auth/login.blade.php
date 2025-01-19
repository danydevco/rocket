@extends('rocket::themes.our.templates.auth.layout')

@section('title', config('rocket.pages.auth.login.title'))

@section('content')

    <form class="flex flex-col gap-5" action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf

        <div class="text-center">
            <h3 class="text-lg font-bold text-gray-900 leading-none">
                Inicio de sesión
            </h3>
        </div>

        @if(config('rocket.global.features.enable_social_login'))
            <div class="grid grid-cols-2 gap-2.5">
                @if(config('rocket.pages.auth.login.loginWith.google'))
                    <a class="inline-flex items-center cursor-pointer leading-none rounded-md h-8 px-3 gap-1.5 border font-medium text-sm text-gray-700 border-gray-300 bg-light justify-center" href="#">
                        <img alt="" class="size-3.5 shrink-0" src="{{ asset('/vendor/rocket/assets/img/google.svg') }}">
                        Google
                    </a>
                @endif

                @if(config('rocket.pages.auth.login.loginWith.github'))
                    <a class="inline-flex items-center cursor-pointer leading-none rounded-md h-8 px-3 gap-1.5 border font-medium text-sm text-gray-700 border-gray-300 bg-light justify-center" href="#">
                        <img alt="" class="size-3.5 shrink-0 dark:hidden" src="{{ asset('/vendor/rocket/assets/img/github.svg') }}">
                        <img alt="" class="size-3.5 shrink-0 light:hidden" src="{{ asset('/vendor/rocket/assets/img/github.svg') }}">
                        GitHub
                    </a>
                @endif
            </div>

            <hr class="border-gray-200">

            <h3 class="text-lg font-bold text-gray-900 leading-none mb-1">
                O usa tu correo electrónico
            </h3>
        @endif


        <div>
            @if (config('quick.login.type') === 'email')
                <x-rocket-label for="email" text="Correo electrónico" size="sm" hierarchy="basic" />
                <x-rocket-input id="email" name="email" type="email" hierarchy="basic" value="{{ old('email') }}"/>
            @else
                <x-rocket-label for="username" text="Usuario" size="sm" hierarchy="basic"/>
                <x-rocket-input id="username" name="username" type="text" hierarchy="basic" value="{{ old('email') }}"/>
            @endif
        </div>

        <div>
            <x-rocket-label for="password" text="Contraseña" size="sm" hierarchy="basic" />
            <x-rocket-input id="password" name="password" type="password"/>
        </div>

        <x-rocket-button text="Iniciar sesión"/>

        <div class="flex flex-col items-center gap-2">
            @if(config('rocket.global.features.enable_registration'))
                <p class="text-base">¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-blue-500 font-medium hover:underline">Regístrate gratis</a>
                </p>
            @endif

            <a class="hover:underline text-blue-500 font-medium" href="{{ route('password.email') }}">¿Olvidaste tu contraseña?</a>
        </div>
    </form>
@stop
