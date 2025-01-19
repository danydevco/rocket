@extends('rocket::themes.able.templates.auth')

@section('content')
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <h4 class="text-center f-w-500 my-4">Registro</h4>
        <div class="mb-3">
            {{ html()->text('first_names')->class('form-control')->placeholder("Nombre")->required() }}
        </div>
        <div class="mb-3">
            {{ html()->email('email')->class('form-control')->placeholder("Correo electrónico")->required() }}
        </div>
        <div class="mb-3">
            {{ html()->password('password')->class('form-control')->placeholder("Contraseña")->required() }}
        </div>
        <div class="mb-3">
            {{ html()->password('password_confirmation')->class('form-control')->placeholder("Confirme la contraseña")->required() }}
        </div>

        <div class="d-flex mt-1 justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" required/>
                <label class="form-check-label text-muted" for="customCheckc1">Acepto todos los términos y condiciones</label>
            </div>
        </div>
        <div class="d-grid mt-4">
            <button class="btn btn-primary" type="submit">Registrarse</button>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-4">
            <h6 class="f-w-500 mb-0">¿Ya tienes una cuenta?</h6>
            <a href="{{ route('login') }}" class="link-primary">Inicie sesión</a>
        </div>
    </form>
@stop

