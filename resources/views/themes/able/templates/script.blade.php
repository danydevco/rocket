<!-- Required Js -->
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/jquery.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/pcoded.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/fontawesome.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/toastr.min.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/simple-datatables.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/autoNumeric.min.js') }}"></script>
<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/sweetalert2.all.min.js') }}"></script>
{{--<script src="{{ asset('vendor/rocket/themes/able/assets/js/plugins/notifier.js') }}"></script>--}}

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