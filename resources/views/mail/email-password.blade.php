@extends('rocket::mail.templates.layout')

@section('content')
    <p class="text-center text-lg text-dark fw-600 mb-3">Ayúdenos a proteger su cuenta</p>
    <p class="text-center text-sm text-gray-600 fw-300 mb-1">Antes de restablecer tu contraseña, necesitamos verificar su identidad.</p>
    <p class="text-center text-sm text-gray-600 fw-300">Introduzca el siguiente código en la página de inicio de sesión.</p>
    <div class="text-center my-8 ">
        <div class="w-40 text-center bg-gray-200 p-3 rounded">
            <p class="text-center text-2xl">{{ $token }}</p>
        </div>
    </div>
    <p class="text-center text-sm text-gray-600 fw-300 mb-1 px-10 lh-base">
        Si no ha intentado restablecer tu contraseña recientemente, le recomendamos cambiar su contraseña para mantener su cuenta segura. Su código de verificación caduca después de 60 minutos.
    </p>
@stop