<?php

namespace LetsBot\Api;

use Illuminate\Support\ServiceProvider;
use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Http\GuzzleClient;

/**
 * Service provider for Laravel integration
 */
class LetsBotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/letsbot.php' => config_path('letsbot.php'),
        ], 'letsbot-config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/letsbot.php', 'letsbot');

        $this->app->singleton(HttpClientInterface::class, function ($app) {
            $client = new GuzzleClient();
            $client->setApiKey(config('letsbot.api_key'));
            $client->setDomain(config('letsbot.domain', 'https://api.letsbot.net'));
            $client->setSSLVerify(config('letsbot.ssl_verify', true));
            
            return $client;
        });

        $this->app->singleton(ServiceFactory::class, function ($app) {
            return new ServiceFactory($app->make(HttpClientInterface::class));
        });

        $this->app->bind('letsbot', function ($app) {
            return new LetsBot();
        });
    }
}
