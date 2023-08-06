<?php

namespace LetsBot\Api;

use Illuminate\Support\ServiceProvider;

class LetsBotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // publish config file
        $this->publishes([
             __DIR__.'/../publish/config/letsbot.php' =>
            base_path('config/letsbot.php'),
        ], 'letsbot-config');
    }
}
