<?php 

namespace Davidlares\GS1\AI;

use Davidlares\GS1\AI\Services\IdentifierInterface;
use Davidlares\GS1\AI\Contracts\ClientInterface;
use Davidlares\GS1\AI\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;
use Davidlares\GS1\AI\Client\GS1Client;

class GS1AIServiceProvider extends ServiceProvider 
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge package defaults with any published config
        $this->mergeConfigFrom(__DIR__. '/../config/gs1-ai.php', 'gs1-ai');
        // client as singleton
        $this->app->singleton(ClientInterface::class, function($app) {
            return new GS1Client(config('gs1-ai.api_url'));
        });
        // identifier interface as singleton
        $this->app->singleton(IdentifierInterface::class); 
        // main class
        $this->app->singleton(GS1::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {   
        // registering command (used only for config file)
        if($this->app->runningInConsole()) 
            $this->commands([InstallCommand::class]);
        // config publishable
        $this->publishes([__DIR__. '/../config/gs1-ai.php' => config_path('gs1-ai.php')], 'gs1-config');
    }
}