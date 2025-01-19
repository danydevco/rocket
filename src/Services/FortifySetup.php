<?php

namespace Danydevco\Rocket\Services;

use App\Providers\FortifyServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class FortifySetup {
    public function replaceFortifyServiceProvider(): void {
        $sourcePath      = $this->basePath('stubs/fortify/FortifyServiceProvider.php');
        $destinationPath = base_path('app/Providers/FortifyServiceProvider.php');

        if (File::exists($sourcePath)) {
            File::copy($sourcePath, $destinationPath);
        } else {
            $this->error('El archivo CustomFortifyServiceProvider.php no se encontró en stubs/fortify.');
        }
    }

    public function replaceFortifyConfig(): void {
        $sourcePath      = $this->basePath('config/fortify.php');
        $destinationPath = base_path('config/fortify.php');

        if (File::exists($sourcePath)) {
            File::copy($sourcePath, $destinationPath);
        } else {
            $this->error('El archivo CustomFortifyServiceProvider.php no se encontró en stubs/fortify.');
        }
    }

    public function replaceCreateNewUser(): void {
        $sourcePath      = $this->basePath('stubs/fortify/CreateNewUser.php');
        $destinationPath = base_path('app/Actions/Fortify/CreateNewUser.php');

        if (File::exists($sourcePath)) {
            File::copy($sourcePath, $destinationPath);
        } else {
            $this->error('El archivo CreateNewUser.php no se encontró en stubs/fortify.');
        }
    }

    public function registerFortifyServiceProvider(): void {
        if (!method_exists(ServiceProvider::class, 'addProviderToBootstrapFile')) {
            $this->error('El método addProviderToBootstrapFile no existe en la clase ServiceProvider.');
            return;
        }
        ServiceProvider::addProviderToBootstrapFile(FortifyServiceProvider::class);
    }

    protected function basePath($path = ''): string {
        return __DIR__ . '/../../' . $path;
    }

    protected function error(string $message): void {
        // Manejo de errores, por ejemplo, lanzar una excepción o registrar el error.
        echo $message;
    }
}
