<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunNpmCommand extends Command
{
    protected $signature = 'npm:run';
    protected $description = 'Run npm command';

    public function handle()
    {
        $this->info('Running npm command...');
        exec('npm run', $output, $returnVar);

        if ($returnVar === 0) {
            $this->info('NPM command executed successfully.');
        } else {
            $this->error('NPM command failed: ' . implode("\n", $output));
        }
    }
}