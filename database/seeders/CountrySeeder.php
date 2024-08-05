<?php

namespace Database\Seeders;

use Danydev\Rocket\Models\Country;
use Danydev\Rocket\Models\RoleHasPermission;
use Danydev\Rocket\Models\Value;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CountrySeeder extends Seeder {
    public function run(): bool {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {

            DB::beginTransaction();

            DB::table('countries')->truncate();

            $countries = [
                /* ['id', 'name', 'abbreviation', 'state_id'] */
                [1, 'Default', 'def', 4001],
                [2, 'Colombia', 'col', 4001],
            ];

            foreach ($countries as $item) {
                $country               = new Country();
                $country->id           = $item[0];
                $country->name         = $item[1];
                $country->abbreviation = $item[2];
                $country->state_id     = $item[3];
                $country->save();
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