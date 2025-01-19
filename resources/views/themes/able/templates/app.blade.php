<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- [Head] start -->
    <head>

        <title>@yield('title', ' - Finan')</title>

        @include('rocket::themes.able.templates.meta')

        @include('rocket::themes.able.templates.styles')

        @stack('styles')

    </head>
    <!-- [Head] end -->

    <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">

        @include('rocket::themes.able.templates.loader')

        @include('rocket::themes.able.templates.sidebar')

        @include('rocket::themes.able.templates.header')

        <!-- [ Main Content ] start -->
        <div class="pc-container">
            <div class="pc-content">
                <!-- [ Main Content ] start -->
                @yield('content')
                <!-- [ Main Content ] end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->

        @include('rocket::themes.able.templates.offcanvas')

        {{-- include('rocket::themes.able.templates.footer') --}}

        @include('rocket::themes.able.templates.script')

        @stack('modals')

        @stack('script')



    </body>
</html>
