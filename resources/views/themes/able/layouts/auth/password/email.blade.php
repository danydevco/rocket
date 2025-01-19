@extends('rocket::themes.able.templates.auth')

@section('title', config('rocket.pages.auth.login.title'))

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="mb-0">
                <b>¿Olvidaste tu contraseña?</b>
            </h3>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            {{ html()->email('email')->class('form-control')->placeholder("Correo electrónico")->required() }}
        </div>
        <p class="mt-4 text-sm text-muted">No olvides revisar la carpeta de SPAM.</p>
        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-primary">Restablecer contraseña</button>
        </div>
    </form>
@stop

