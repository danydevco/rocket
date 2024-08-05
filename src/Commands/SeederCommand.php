<?php

namespace Danydevco\Rocket\Commands;

use Danydevco\Rocket\seeders\DatabaseSeeder;
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