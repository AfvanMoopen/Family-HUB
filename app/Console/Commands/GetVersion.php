<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:getversion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get current version of test';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->line(config('test.app_version'));
    }
}
