<?php

namespace DeveloperHouse\Rocket\seeders;

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

            /* Permisos */
            $permissions = [
                'user' => [
                    ['user.index', 'Listar usuarios'],
                    ['user.create', 'Crear usuario'],
                    ['user.show', 'Ver detalles de usuario'],
                    ['user.update', 'Actualizar usuario'],
                    ['user.delete', 'Eliminar usuario'],
                ],
                'values' => [
                    ['value.index', 'Listar valores'],
                    ['value.create', 'Crear valor'],
                    ['value.show', 'Ver detalles de valor'],
                    ['value.update', 'Actualizar valor'],
                ],
                'parameter' => [
                    ['parameter.create', 'Crear parámetro'],
                    ['parameter.update', 'Actualizar parámetro'],
                    ['parameter.delete', 'Eliminar parámetro'],
                ],
                'countries' => [
                    ['country.index', 'Listar pais'],
                    ['country.create', 'Crear pais'],
                    ['country.show', 'Ver detalles y listado de depatamento de pais'],
                    ['country.edit', 'Actualizar pais'],
                    ['country.destroy', 'Eliminar pais'],
                ],
                'departments' => [
                    ['department.index', 'Listar departamento'],
                    ['department.create', 'Crear departamento'],
                    ['department.show', 'Ver detalles y listado de ciudades de departments'],
                    ['department.edit', 'Actualizar departamento'],
                    ['department.destroy', 'Eliminar departamento'],
                ],
                'cities' => [
                    ['city.index', 'Listar ciudad'],
                    ['city.create', 'Crear ciudad'],
                    ['city.edit', 'Actualizar ciudad'],
                    ['city.destroy', 'Eliminar ciudad'],
                ],
                'roles' => [
                    ['role.index', 'Listar roles'],
                    ['role.create', 'Crear rol'],
                    ['role.show', 'Ver detalles rol y permisos'],
                ],
                'permission' => [
                    ['permission.index', 'Listar permisos'],
                    ['permission.create', 'Crear permiso'],
                    ['permission.destroy', 'Eliminar permiso'],
                ],
                'assign.permission.to.role' => [
                    ['assign.permission.to.role', 'Asignar permiso a rol'],
                ],
                'assign.permission.to.user' => [
                    ['assign.permission.to.user', 'Asignar permiso a usuario'],
                ],
                'assign.role.to.user' => [
                    ['assign.role.to.user', 'Asignar rol a usuario'],
                ],
            ];

            foreach ($permissions as $permission) {

                foreach ($permission as $item) {

                    $permission              = new Permission();
                    $permission->name        = $item[0];
                    $permission->description = $item[1];
                    $permission->save();

                    $role_has_permission                = new RoleHasPermission();
                    $role_has_permission->permission_id = $permission->id;
                    $role_has_permission->role_id       = $administrator->id;
                    $role_has_permission->save();

                    //$model_has_permission                = new ModelHasPermission();
                    //$model_has_permission->permission_id = $permission->id;
                    //$model_has_permission->model_type    = 'App\Models\User';
                    //$model_has_permission->model_id      = 1;
                    //$model_has_permission->save();

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