<!doctype html>
<html lang="es">
    <!-- [Head] start -->
    <head>
        <title>@yield('title', ' - Finan')</title>

        @include('rocket::themes.able.templates.meta')

        @include('rocket::themes.able.templates.styles')

        @stack('styles')
    </head>

    <!-- [Head] end -->
    <!-- [Body] Start -->
    <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">

        <x-rocket-toast-messages/>

        @include('rocket::themes.able.templates.loader')

        <div class="auth-main">
            <div class="auth-wrapper v1">
                <div class="auth-form">
                    <div class="card my-5">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{ route('login') }}">
                                    <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="img"/>
                                </a>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('rocket::themes.able.templates.script')

    </body>
    <!-- [Body] end -->
</html>
