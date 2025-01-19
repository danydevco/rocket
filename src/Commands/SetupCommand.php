<?php

namespace Danydevco\Rocket\Commands;

use Danydevco\Rocket\Services\FortifySetup;
use Danydevco\Rocket\Services\ModelSetup;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class SetupCommand extends Command {
    protected $signature = 'rocket:setup';

    protected $description = 'Setup Rocket Package with necessary configurations';

    public function handle(): void {

        $this->info('Inicializando configuración de Rocket...');

        // Publicar configuraciones
        $this->info('Publicando configuraciones...');
        Artisan::call('vendor:publish', ['--tag' => 'rocket-config']);
        Artisan::call('vendor:publish', ['--tag' => 'rocket-views']);
        Artisan::call('vendor:publish', ['--tag' => 'rocket-lang']);
        Artisan::call('vendor:publish', ['--tag' => 'rocket-migrations']);
        Artisan::call('vendor:publish', ['--tag' => 'rocket-seeders']);
        Artisan::call('vendor:publish', ['--tag' => 'rocket-public']);

        // Publicar migraciones de Spatie
        $this->info('Publicando Spatie Permission...');
        Artisan::call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);

        // Setup config fortify
        $this->info('Publicando Fortify...');
        $this->setupFortify();

        $this->info('Configurando modelos...');
        $this->setupModels();

        // Ejecutar migraciones
        $this->info('Ejecutando migraciones...');
        Artisan::call('migrate');

        // Llamar comandos adicionales si es necesario
        $this->info('Configuración de Rocket completada.');
    }

    protected function setupFortify(): void {
        Artisan::call('vendor:publish', ['--provider' => 'Laravel\Fortify\FortifyServiceProvider']);

        $fortifySetup = new FortifySetup();
        $fortifySetup->replaceFortifyServiceProvider();
        $fortifySetup->replaceFortifyConfig();
        $fortifySetup->replaceCreateNewUser();
        $fortifySetup->registerFortifyServiceProvider();
    }

    protected function setupModels(): void {
        $modelSetup = new ModelSetup();
        $modelSetup->replaceUserModel();
    }

    protected function basePath($path = ''): string {
        return __DIR__ . '/../../' . $path;
    }

}
