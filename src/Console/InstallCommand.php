<?php

namespace Davidlares\GS1\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'gs1-ai:install';
    protected $description = 'Command for installing the GS1-AI package files';
    
    public function handle(): void
    {
        // publishing the configuration file
        $this->call('vendor:publish', [
            '--tag' => 'gs1-config',
        ]);
        // then
        $this->info('Packaged installed successfully');
        $this->line('');
        $this->comment('Don\'t forget to add GS1_AI_API_URL to your .env file.');
    }
}