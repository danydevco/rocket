<div class="toast-container p-4 mb-2 end-0 position-fixed top-0 end-0">

    {{-- Toast de Éxito --}}
    @if (session('success'))
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('assets/images/favicon.svg') }}" class="img-fluid m-r-5" alt="images" style="width: 17px">
                <strong class="me-auto">{{ config('app.name') }}</strong>
                <small>Justo ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-success">{{ session('success') }}</div>
        </div>
    @endif

    {{-- Toast de Error --}}
    @if (session('error'))
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('assets/images/favicon.svg') }}" class="img-fluid m-r-5" alt="images" style="width: 17px">
                <strong class="me-auto">{{ config('app.name') }}</strong>
                <small>Justo ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-danger">{{ session('error') }}</div>
        </div>
    @endif

    @if (session('status'))
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('assets/images/favicon.svg') }}" class="img-fluid m-r-5" alt="images" style="width: 17px">
                <strong class="me-auto">{{ config('app.name') }}</strong>
                <small>Justo ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-success">{{ session('status') }}</div>
        </div>
    @endif

    {{-- Toast de Errores de Validación --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="{{ asset('assets/images/favicon.svg') }}" class="img-fluid m-r-5" alt="images" style="width: 17px">
                    <strong class="me-auto">{{ config('app.name') }}</strong>
                    <small>Justo ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-danger">{{ $error }}</div>
            </div>
        @endforeach
    @endif

</div>
