<?php

namespace Danydevco\Rocket\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Exception;
use seeders\DatabaseSeeder;
use seeders\RoleSeeder;
use Spatie\Permission\PermissionRegistrar;

class TruncateCommand extends Command {
    protected $signature = 'rocket:truncate';

    protected $description = 'Truncate all table of package';

    public function handle(): void {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        $this->line('Truncated users table.');

        // DB::table('personal_access_tokens')->truncate();
        // $this->line('Truncated personal_access_tokens table.');

        DB::table('model_has_permissions')->truncate();
        $this->line('Truncated model_has_permissions table.');

        DB::table('role_has_permissions')->truncate();
        $this->line('Truncated role_has_permissions table.');

        DB::table('permissions')->truncate();
        $this->line('Truncated permissions table.');

        DB::table('model_has_roles')->truncate();
        $this->line('Truncated model_has_roles table.');

        DB::table('roles')->truncate();
        $this->line('Truncated roles table.');

        DB::table('values')->truncate();
        $this->line('Truncated values table.');

        DB::table('parameters')->truncate();
        $this->line('Truncated parameters table.');

        DB::table('cities')->truncate();
        $this->line('Truncated cities table.');

        DB::table('departments')->truncate();
        $this->line('Truncated departments table.');

        DB::table('countries')->truncate();
        $this->line('Truncated countries table.');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('Tables truncated successfully.');

    }
}
