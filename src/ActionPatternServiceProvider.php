<?php

namespace Hachicode\ActionPattern;

use Hachicode\ActionPattern\Commands\MakeActionCommand;
use Illuminate\Support\ServiceProvider;

class ActionPatternServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/action-pattern.php' => config_path('action-pattern.php'),
        ], 'action-pattern-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeActionCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/action-pattern.php', 'action-pattern');
    }
}
