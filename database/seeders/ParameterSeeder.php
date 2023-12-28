<?php

namespace Database\Seeders;

use DeveloperHouse\Rocket\Models\Parameter;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParameterSeeder extends Seeder {
    public function run(): bool {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {

            DB::beginTransaction();

            DB::table('parameters')->truncate();

            $items = [
                // value_id, code, name, state, description
                // Estados de los usuarios
                [
                    [1, 1001, 'Activa', 1, 'Cuenta activo'],
                    [1, 1002, 'Pendiente por confirmación de correo', 1, 'Pendiente por confirmación de correo electrónico'],
                    [1, 1003, 'Reinicio de contraseña', 1, 'Requiere que la contraseña sea cambiada'],
                    [1, 1004, 'Inactiva por intentos fallidos', 1, 'Cuenta inactiva por intentos de contraseña fallida'],
                ],
                // Tipos de documentos de identificación
                [
                    [2, 2001, 'C.C.', 1, 'Cedula de ciudadania'],
                    [2, 2002, 'C.E.', 1, 'Cedula de extranjeria'],
                    [2, 2003, 'T.I.', 1, 'Documento de identidad'],
                ],
                // Géneros
                [
                    [3, 3001, 'Mujer', 1, 'Genero femenino'],
                    [3, 3002, 'Hombre', 1, 'Genero masculino'],
                ],
                // Estados activo o inactivo
                [
                    [4, 4001, 'Activo', 1, 'Estado activo'],
                    [4, 4002, 'Inactivo', 1, 'Estado inactivo'],
                ],
                // Medios para operar en la plataforma
                [
                    [5, 5001, 'Aplicación web', 1, 'Aplicación web'],
                    [5, 5002, 'Aplicación móvil', 1, 'Aplicación móvil'],
                ],
                // Estados de los intentos de inicio de sesión
                [
                    [6, 6001, 'Contraseña incorrecta', 1, 'Intento con contraseña incorrecta'],
                    [6, 6002, 'Exito', 1, 'Intento exitoso'],
                ],
            ];


            // Loop through each item group and create corresponding Parameter records
            foreach ($items as $itemGroup) {
                foreach ($itemGroup as $item) {
                    $parameter              = new Parameter();
                    $parameter->value_id    = $item[0];
                    $parameter->code        = $item[1];
                    $parameter->name        = $item[2];
                    $parameter->description = $item[4];
                    $parameter->state       = '1';
                    $parameter->save();
                }
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();

            return false;

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return true;
    }

}