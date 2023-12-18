<?php

return [
    'not_found' => "¡Lo siento! No te logramos encontrar",
    'email' => [
        'subject' => 'Código para restablecer la contraseña',
        'success' => [
            'send' => 'Correo electrónico enviado con éxito',
        ],
        'error' => [
            'send' => '¡Lo siento! Por favor, inténtelo de nuevo más tarde',
        ],
    ],
    'reset' => [
        'subject' => 'Tu contraseña ha sido restablecida!',
        'success' => [
            'reset' => 'Tu contraseña ha sido restablecida!',
        ],
        'error' => [
            'token' => 'Este código de restablecimiento de contraseña no es válido.',
            'error' => '¡Lo siento! Por favor, inténtelo de nuevo más tarde',
        ],
    ],

];