<?php

namespace Danydev\Rocket\Commands;

use Danydev\Rocket\seeders\DatabaseSeeder;
use Dflydev\DotAccessData\Data;
use Illuminate\Console\Command;

class SeederCommand extends Command {
    protected $signature = 'rocket:seeder';

    protected $description = 'Rocket init seeders';

    public function handle(): void {
        $seeder = new DatabaseSeeder();
        $seeder();
        $this->info('Seeder successfully.');
    }
}