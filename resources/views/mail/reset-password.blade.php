@extends('rocket::mail.templates.layout')

@section('content')
    <p class="text-center text-lg text-dark fw-600 mb-4">Cambio de contraseña exitoso</p>
    <p class="text-justify text-sm text-gray-600 fw-300 mb-1">Le informamos que su contraseña ha sido cambiada con éxito.</p>
    <p class="text-justify text-sm text-gray-600 fw-300"> Si usted realizó esta acción, no es necesario tomar ninguna medida adicional.</p>

    <p class="text-justify text-sm text-gray-600 fw-300 my-5 lh-base">
        Si no reconoce este cambio o no realizó la modificación, le recomendamos que inicie sesión de inmediato y contacte a nuestro equipo de soporte.
    </p>
    <p class="text-justify text-sm text-gray-600 fw-300 mb-3 lh-base">
        Gracias por su atención.
    </p>

    <p class="text-justify text-sm text-gray-700 fw-300 my-5 lh-base">
        Atentamente,<br>
        Equipo de Soporte de
    </p>
@stop