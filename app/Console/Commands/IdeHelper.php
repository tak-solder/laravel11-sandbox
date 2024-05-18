<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IdeHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run ide-helper:generate and ide-helper:meta if the environment is local';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if (app()->environment('local')) {
            $this->call('ide-helper:generate');
            $this->call('ide-helper:meta');
        }
    }
}
