<!DOCTYPE html>
<html class="h-full light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <title>@yield('title', ' - '. config('rocket.our.name'))</title>
        @include('rocket::themes.common.meta')
        @include('rocket::themes.common.tailwind')
        <link href="{{ asset('vendor/rocket/assets/scss/app.css') }}" rel="stylesheet">
    </head>

    <body class="antialiased flex h-full text-base text-gray-700 dark:bg-coal-500">
        <div class="flex items-center justify-center grow bg-center bg-no-repeat page-auth">
            <div class="w-full max-w-sm mx-auto">
                <div class="bg-white p-10 rounded-md shadow-slate-500 md:shadow-md border-gray-200 md:border">
                    @yield('content')
                </div>
            </div>
        </div>

        <script>

            document.addEventListener('DOMContentLoaded', function () {

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        toastr.error('{{ $error }}');
                    @endforeach
                @endif

                @if (Session::get('success'))
                    toastr.success('{{ Session::get('success') }}');
                @endif

                @if (Session::get('error'))
                    toastr.error('{{ Session::get('error') }}');
                @endif

            });

        </script>

    </body>

</html>
