<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- [Head] start -->
    <head>

        <title>@yield('title', ' - Finan')</title>

        @include('rocket::themes.able.templates.meta')

        @include('rocket::themes.able.templates.styles')

    </head>
    <!-- [Head] end -->

    <!-- [Body] Start -->

    <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">

        @include('rocket::themes.able.templates.loader')

        <!-- [ Sidebar Menu ] start -->
        <x-rocket-sidebar></x-rocket-sidebar>
        <!-- [ Sidebar Menu ] end -->

        <!-- [ Header ] start -->
        <x-rocket-header></x-rocket-header>
        <!-- [ Header ] end -->


        <!-- [ Main Content ] start -->
        @yield('content')
        <!-- [ Main Content ] end -->

        @include('rocket::themes.able.templates.footer')

        <!-- Script -->
        @include('rocket::themes.able.templates.script')

        @stack('modals')

        @stack('script')

        <script>layout_change('light');</script>


        <script>layout_theme_contrast_change('false');</script>


        <script>change_box_container('false');</script>


        <script>layout_caption_change('true');</script>


        <script>layout_rtl_change('false');</script>


        <script>preset_change("preset-1");</script>

    </body>
    <!-- [Body] end -->

</html>
