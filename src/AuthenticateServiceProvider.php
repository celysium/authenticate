<?php

namespace Celysium\Authenticate;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;


class AuthenticateServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->loadAndPublishConfig();

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('api', Authenticate::class);

    }

    public function register()
    {
        $this->app->bind('authenticate', function ($app) {
            return new Authenticate();
        });
    }

    private function loadAndPublishConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/authenticate.php', 'authenticate'
        );

        $this->publishes([
            __DIR__ . '/../config/authenticate.php' => config_path('authenticate.php'),
        ], 'authenticate-config');
    }
}
