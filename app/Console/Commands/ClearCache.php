<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all temporary files, including cache and logs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        if (posix_geteuid() == 0) {
            unlink(base_path() . '/storage/logs/laravel.log');
        } else {
            $this->warn("This should be run as root.");
        }
        return Command::SUCCESS;
    }
}
