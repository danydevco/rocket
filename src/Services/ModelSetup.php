<?php

namespace Danydevco\Rocket\Services;

use App\Providers\FortifyServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModelSetup {

    public function replaceUserModel(): void {
        $sourcePath      = $this->basePath('stubs/models/User.php'); // Ruta en tu paquete
        $destinationPath = base_path('app/Models/User.php'); // Ruta en la app destino

        if (File::exists($sourcePath)) {
            File::copy($sourcePath, $destinationPath);
        } else {
            echo "❌ Error: No se encontró User.php en stubs/models.\n";
        }
    }

    protected function basePath($path = ''): string {
        return __DIR__ . '/../../' . $path;
    }

    protected function error(string $message): void {
        // Manejo de errores, por ejemplo, lanzar una excepción o registrar el error.
        echo $message;
    }
}
