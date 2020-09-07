<?php

namespace Muaramasad\Airport;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->commands(\Muaramasad\Airport\Commands\SeedCommand::class);
    }

    public function  boot()
    {
        if ($this->isLaravel53orAbove()) {
            $this->loadMigrationsFrom(__DIR__ . '/migrations');
        } else {
            $this->publishes([
                __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
            ] , 'migrations');
        }
    }

    protected  function isLaravel53orAbove()
    {
        return version_compare($this->app->version(), '5.3.0', '>=');
    }
}