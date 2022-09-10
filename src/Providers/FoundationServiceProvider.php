<?php

declare(strict_types=1);

namespace Manzadey\OrchidClear\Providers;

use Illuminate\Support\ServiceProvider;
use Manzadey\OrchidClear\Console\Commands\InstallCommand;

class FoundationServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->commands(InstallCommand::class);
    }

    public function boot() : void
    {
        $this->publishes([
            __DIR__ . '/../../stubs/routes' => base_path('routes'),
            __DIR__ . '/../../stubs/app'    => app_path(),
        ], 'orchid-clear-stubs');
    }
}
