<?php

namespace Database\Seeders;

use DeveloperHouse\Rocket\Models\RoleHasPermission;
use DeveloperHouse\Rocket\Models\Value;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class ValueSeeder extends Seeder {
    public function run(): bool {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {

            DB::beginTransaction();

            DB::table('values')->truncate();

            $items = [
                [1, 'Estados de los usuarios'],
                [2, 'Tipos de documentos de identificación'],
                [3, 'Géneros'],
                [4, 'Estados activo o inactivo'],
                [5, 'Medios para operar en la plataforma'],
                [6, 'Estados de los intentos de inicio de sesión'],
            ];

            foreach ($items as $item) {
                $value              = new Value();
                $value->id          = $item[0];
                $value->name        = $item[1];
                $value->save();
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
