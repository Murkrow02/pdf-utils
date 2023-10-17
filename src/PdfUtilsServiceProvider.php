<?php

namespace Murkrow\PdfUtils;

use Illuminate\Support\ServiceProvider;

class PdfUtilsServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        // Config file
        $this->publishes(
            [
                __DIR__ . '/../config/pdf-utils.php' => config_path('pdf-utils.php')
            ],
            'config');
    }
}
