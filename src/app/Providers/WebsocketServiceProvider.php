<?php

namespace Sirj3x\Websocket\app\Providers;

use Illuminate\Support\ServiceProvider;
use Sirj3x\Websocket\app\Console\Commands\EventMakeCommand;
use Sirj3x\Websocket\app\Console\Commands\WebsocketCommand;

class WebsocketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/websocket.php' => config_path('websocket.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                WebsocketCommand::class,
                EventMakeCommand::class
            ]);
        }
    }
}
