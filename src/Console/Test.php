<?php

namespace LyneTechnologies\LaravelWatchtower\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Test extends Command
{
    protected $signature = 'watchtower:test';

    protected $description = 'Test the enabled Watchtower notification streams.';

    public function handle()
    {
        try {
            throw new \Exception('Watchtower Test Command');
        }catch (\Exception $e){
            report($e);
        }

        $this->info('Complete');
        return 1;
    }
}