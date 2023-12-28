<?php

namespace Database\Seeders;

use DeveloperHouse\Rocket\Models\ModelHasRoles;
use DeveloperHouse\Rocket\Models\RoleHasPermission;
use DeveloperHouse\Rocket\Models\Value;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run(): bool {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {

            DB::beginTransaction();

            $user              = new User();
            $user->id          = 1;
            $user->first_names = 'Developer';
            $user->last_names  = 'House S.A.S';
            $user->username    = 'developerhouse';
            $user->gender_id   = 3002;
            $user->state_id    = 1001;
            $user->email       = 'rocket@developerhouse.co';
            $user->password    = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
            $user->save();

            $rol             = new ModelHasRoles();
            $rol->role_id    = 1;
            $rol->model_type = 'App\Models\User';
            $rol->model_id   = $user->id;
            $rol->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();

            return false;

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return true;
    }

}