<?php

namespace Celysium\Authenticate;

use Celysium\Authenticate\Middlewares\MustLogin;
use Celysium\Authenticate\Repository\UserServiceInterface;
use Celysium\Authenticate\Repository\UserServiceRepository;
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
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        $this->loadAndPublishConfig();

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('api', Authenticate::class);
        $router->aliasMiddleware('authenticate', MustLogin::class);
    }

    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserServiceRepository::class);

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
