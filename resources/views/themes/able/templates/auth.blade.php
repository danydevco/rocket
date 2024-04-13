<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- [Head] start -->

    <head>

        <!-- [Head] start -->
        <title>@yield('title', ' - Finan')</title>

        @include('rocket::themes.able.templates.meta')

        @include('rocket::themes.able.templates.styles')

    </head>
    <!-- [Head] end -->

    <!-- [Body] Start -->

    <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->

        <div class="auth-main">
            <div class="auth-wrapper v1">
                <div class="auth-form">
                    <div class="card my-5">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="#">
                                    <img src="{{ asset('vendor/rocket/themes/able/assets/images/logo-dark.svg') }}" alt="img" style="width: 50%">
                                </a>
                            </div>

                            <!-- Content Section-->
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <!-- Required Js -->
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/jquery.js') }}"></script>
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/simplebar.min.js') }}"></script>
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/fonts/custom-font.js') }}"></script>
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/pcoded.js') }}"></script>
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/feather.min.js') }}"></script>
        <script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/toastr.min.js') }}"></script>

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
    <!-- [Body] end -->

</html>