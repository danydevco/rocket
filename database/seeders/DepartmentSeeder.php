<?php

namespace Database\Seeders;

use Danydevco\Rocket\Models\Department;
use Danydevco\Rocket\Models\RoleHasPermission;
use Danydevco\Rocket\Models\Value;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DepartmentSeeder extends Seeder {
    public function run(): bool {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {

            DB::beginTransaction();

            DB::table('departments')->truncate();

            $items = [];

            $colombia = [
                [1, 'Default', 4001],
                [2, 'Antioquia', 4001],
                [2, 'Atlántico', 4001],
                [2, 'Bogotá', 4001],
                [2, 'Bolívar', 4001],
                [2, 'Boyacá', 4001],
                [2, 'Caldas', 4001],
                [2, 'Caquetá', 4001],
                [2, 'Casanare', 4001],
                [2, 'Cauca', 4001],
                [2, 'Cesar', 4001],
                [2, 'Chocó', 4001],
                [2, 'Córdoba', 4001],
                [2, 'Cundinamarca', 4001],
                [2, 'Guainía', 4001],
                [2, 'Guaviare', 4001],
                [2, 'Huila', 4001],
                [2, 'La Guajira', 4001],
                [2, 'Magdalena', 4001],
                [2, 'Meta', 4001],
                [2, 'Nariño', 4001],
                [2, 'Norte de Santander', 4001],
                [2, 'Putumayo', 4001],
                [2, 'Quindío', 4001],
                [2, 'Risaralda', 4001],
                [2, 'San Andrés y Providencia', 4001],
                [2, 'Santander', 4001],
                [2, 'Sucre', 4001],
                [2, 'Tolima', 4001],
                [2, 'Valle del Cauca', 4001],
                [2, 'Vaupés', 4001],
                [2, 'Vichada', 4001],
            ];


            $items = array_merge($items, $colombia);

            foreach ($items as $item) {
                $department             = new Department();
                $department->country_id = $item[0];
                $department->name       = $item[1];
                $department->state_id   = $item[2];
                $department->save();
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