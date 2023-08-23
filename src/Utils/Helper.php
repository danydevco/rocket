<?php

use App\Models\User;

if (!function_exists('first_name_and_surname')) {

    function first_name_and_surname($names, $surnames) {
        $names    = explode(' ', $names);
        $surnames = explode(' ', $surnames);

        return ucfirst($names[0] . ' ' . $surnames[0]);
    }

}

if (!function_exists('type_and_dni')) {

    function type_and_dni(User $user) {
        return $user->typeOfDni->name . ' ' . $user->dni;
    }

}

if (!function_exists('get_greeting')) {
    /**
     * Devuelve el mensaje a mostrar en el menu sidebar
     *
     * @return string
     */
    function get_greeting(): string {

        $time = date('H');

        if ($time >= '5' && $time < '12') {
            return 'Buenos dias';
        }

        if ($time >= '12' && $time < '18') {
            return 'Buenas tardes';
        }

        return 'Buenas noches';

    }
}

if (!function_exists('detect')) {

    function detect() {
        $browser = ['IE', 'OPERA', 'MOZILLA', 'NETSCAPE', 'FIREFOX', 'SAFARI', 'CHROME'];
        $os      = ['WIN', 'MAC', 'LINUX', 'ANDROID', 'IPHONE'];

        # definimos unos valores por defecto para el navegador y el sistema operativo
        $info['browser'] = 'OTHER';
        $info['os']      = 'OTHER';
        $info['version'] = 'OTHER';

        # buscamos el navegador con su sistema operativo
        foreach ($browser as $parent) {
            $s       = stripos($_SERVER['HTTP_USER_AGENT'], $parent);
            $f       = $s + strlen($parent);
            $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
            $version = preg_replace('/[^0-9,.]/', '', $version);
            if ($s) {
                $info['browser'] = $parent;
                $info['version'] = $version;
            }
        }

        # obtenemos el sistema operativo
        foreach ($os as $val) {
            if (stripos($_SERVER['HTTP_USER_AGENT'], $val) !== false) {
                $info['os'] = $val;
            }
        }

        $info['ip'] = get_real_ip();

        # devolvemos el array de valores
        return $info;
    }

}

if (!function_exists('get_real_ip')) {

    function get_real_ip() {
        return $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'] ?? $_SERVER['REMOTE_ADDR'];
    }
}

if (!function_exists('successfulResponse')) {
    /**
     * @param array $data
     *
     * @return array
     */
    function successfulResponse(array $data = ['message' => "Operación exitosa"]): array {
        return [
            'data' => $data,
            'status' => true,
            'statusCode' => 200,
        ];
    }

}

if (!function_exists('error_message')) {
    /**
     * @param string $msg
     *
     * @return void
     */
    function error_message(string $msg): void {
        // Session::flash('error', $msg);
    }

}
