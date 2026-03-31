<?php

namespace Davidlares\GS1\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Davidlares\GS1\GS1AIServiceProvider;

class TestCase extends Orchestra
{
    /**
     * Loading service provider for Testbench
     */
    protected function getPackageProviders($app)
    {
        return [
            GS1AIServiceProvider::class,
        ];
    }

    /**
     * Set up action (API call).
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('gs1.base_url', 'https://ai.concilier.app/api');
    }
}