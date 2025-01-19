@extends('rocket::themes.able.templates.auth')

@section('title', config('rocket.pages.auth.login.title'))

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h4 class="text-center f-w-500 my-4">Iniciar sesión</h4>
        <div class="mb-3">
            @if(config('rocket.login.field') === 'username')
                {{ html()->text('username')->class('form-control')->placeholder("Nombre de usuario") }}
            @else
                {{ html()->email('email')->class('form-control')->placeholder("Correo eléctronico") }}
            @endif
        </div>
        <div class="mb-3">
            {{ html()->password('password')->class('form-control')->placeholder("Contraseña") }}
        </div>
        <div class="d-flex mt-1 justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked=""/>
                <label class="form-check-label text-muted" for="customCheckc1">¿Recuérdame?</label>
            </div>
            <h6 class="text-secondary f-w-400 mb-0">
                {{ html()->a(route('password.email'), '¿Olvidó su contraseña?')  }}
            </h6>
        </div>
        <div class="d-grid mt-4">
            {{ html()->button('Iniciar sesión', 'submit')->class('btn btn-primary') }}
        </div>
        @if(config('rocket.global.features.enable_registration'))
            <div class="d-flex justify-content-between align-items-end mt-4">
                <h6 class="f-w-500 mb-0">¿No tienes una cuenta?</h6>
                {{ html()->a(route('register'), 'Crear una cuenta')->class('link-primary')  }}
            </div>
        @endif
    </form>
@stop
