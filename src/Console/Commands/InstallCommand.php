<?php

declare(strict_types=1);

namespace Manzadey\OrchidClear\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'orchid-clear:run';

    public function handle() : int
    {
        $this->rmdir(app_path('Orchid/Layouts/Examples'));
        $this->rmdir(app_path('Orchid/Screens/Examples'));

        $this->call('vendor:publish', [
            '--provider' => \Manzadey\OrchidClear\Providers\FoundationServiceProvider::class,
            '--tag'      => [
                'orchid-clear-stubs',
            ],
            '--force'    => true,
        ]);

        $this->components->info('Clear success!');

        return 1;
    }

    private function rmdir($src) : void
    {
        if(!is_dir($src)) {
            return;
        }

        $dir = opendir($src);
        while (false !== ($file = readdir($dir))) {
            if(($file !== '.') && ($file !== '..')) {
                $full = $src . '/' . $file;
                if(is_dir($full)) {
                    $this->rmdir($full);
                } else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }
}
