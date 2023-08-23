<?php

namespace DeveloperHouse\Rocket\seeders;

use Spatie\Permission\Models\Role;

class DatabaseSeeder {
    public function __invoke(): void {

        $role = new RoleSeeder();
        $role();

        $value = new ValueSeeder();
        $value();

        $parameter = new ParameterSeeder();
        $parameter();

        $country = new CountrySeeder();
        $country();

        $department = new DepartmentSeeder();
        $department();

        $city = new CitySeeder();
        $city();

        $user = new UserSeeder();
        $user();

    }


}