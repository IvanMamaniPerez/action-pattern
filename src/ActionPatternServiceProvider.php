<?php

namespace Hachicode\ActionPattern;

use Hachicode\ActionPattern\Commands\MakeActionCommand;
use Illuminate\Support\ServiceProvider;

class ActionPatternServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/action-pattern.php' => config_path('action-pattern.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeActionCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/action-pattern.php', 'action-pattern');
    }
}
