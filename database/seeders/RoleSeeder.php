<?php

namespace Database\Seeders;

use DeveloperHouse\Rocket\Models\RoleHasPermission;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder {
    public function run(): bool {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {

            DB::beginTransaction();

            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            /* Roles */
            //$root          = Role::create(['name' => 'root', 'display_name' => 'root']);
            $administrator = Role::create(['name' => 'administrator', 'display_name' => 'administrador']);
            $client       = Role::create(['name' => 'client', 'display_name' => 'Cliente']);

            /* Permisos */
            $permissions = [
                'user' => [
                    ['user.index', 'Listar usuarios', ['administrator']],
                    ['user.create', 'Crear usuario', ['administrator']],
                    ['user.show', 'Ver detalles de usuario', ['administrator']],
                    ['user.update', 'Actualizar usuario', ['administrator']],
                    ['user.delete', 'Eliminar usuario', ['administrator']],
                ],
                'values' => [
                    ['value.index', 'Listar valores', ['administrator']],
                    ['value.create', 'Crear valor', ['administrator']],
                    ['value.show', 'Ver detalles de valor', ['administrator']],
                    ['value.update', 'Actualizar valor', ['administrator']],
                ],
                'parameter' => [
                    ['parameter.create', 'Crear parámetro', ['administrator']],
                    ['parameter.update', 'Actualizar parámetro', ['administrator']],
                    ['parameter.delete', 'Eliminar parámetro', ['administrator']],
                ],
                'countries' => [
                    ['country.index', 'Listar pais', ['administrator']],
                    ['country.create', 'Crear pais', ['administrator']],
                    ['country.show', 'Ver detalles y listado de depatamento de pais', ['administrator']],
                    ['country.edit', 'Actualizar pais', ['administrator']],
                    ['country.destroy', 'Eliminar pais', ['administrator']],
                ],
                'departments' => [
                    ['department.index', 'Listar departamento', ['administrator']],
                    ['department.create', 'Crear departamento', ['administrator']],
                    ['department.show', 'Ver detalles y listado de ciudades de departments', ['administrator']],
                    ['department.edit', 'Actualizar departamento', ['administrator']],
                    ['department.destroy', 'Eliminar departamento', ['administrator']],
                ],
                'cities' => [
                    ['city.index', 'Listar ciudad', ['administrator']],
                    ['city.create', 'Crear ciudad', ['administrator']],
                    ['city.edit', 'Actualizar ciudad', ['administrator']],
                    ['city.destroy', 'Eliminar ciudad', ['administrator']],
                ],
                'roles' => [
                    ['role.index', 'Listar roles', ['administrator']],
                    ['role.create', 'Crear rol', ['administrator']],
                    ['role.show', 'Ver detalles rol y permisos', ['administrator']],
                ],
                'permission' => [
                    ['permission.index', 'Listar permisos', ['administrator']],
                    ['permission.create', 'Crear permiso', ['administrator']],
                    ['permission.destroy', 'Eliminar permiso', ['administrator']],
                ],
                'assign.permission.to.role' => [
                    ['assign.permission.to.role', 'Asignar permiso a rol', ['administrator']],
                ],
                'assign.permission.to.user' => [
                    ['assign.permission.to.user', 'Asignar permiso a usuario', ['administrator']],
                ],
                'assign.role.to.user' => [
                    ['assign.role.to.user', 'Asignar rol a usuario', ['administrator']],
                ],
            ];

            foreach ($permissions as $permission) {

                foreach ($permission as $item) {

                    $permission              = new Permission();
                    $permission->name        = $item[0];
                    $permission->description = $item[1];
                    $permission->save();

                    $roles = in_array('client', $item[2]) ? [$administrator, $client] : [$administrator];

                    foreach ($roles as $role) {
                        $role_has_permission                = new RoleHasPermission();
                        $role_has_permission->permission_id = $permission->id;
                        $role_has_permission->role_id       = $role->id;
                        $role_has_permission->save();
                    }
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