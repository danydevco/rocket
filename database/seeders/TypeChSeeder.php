<?php

namespace Database\Seeders;

use DeveloperHouse\Rocket\Models\TypeCh;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeChSeeder extends Seeder {
    public function run(): bool {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        try {

            DB::beginTransaction();

            DB::table('type_ches')->truncate();

            $types = [
                [1, 'cookie'],
                [2, 'header'],
            ];

            foreach ($types as $item) {
                $country       = new TypeCh();
                $country->id   = $item[0];
                $country->name = $item[1];
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
