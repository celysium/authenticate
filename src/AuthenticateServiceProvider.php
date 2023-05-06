<?php

namespace Celysium\Authenticate;

use Celysium\Authenticate\Middlewares\AcceptMiddleware;
use Celysium\Authenticate\Middlewares\AuthenticateMiddleware;
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
        $router->pushMiddlewareToGroup('api', AcceptMiddleware::class);

        $router->aliasMiddleware('authenticate', AuthenticateMiddleware::class);

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
