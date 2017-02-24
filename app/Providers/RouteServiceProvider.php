<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => 'App\Http\Controllers\Admin'], function ($router) {
            require app_path('Http/routes.php');
        });

        $router->group(['namespace' => 'App\Http\Controllers\Frontend'], function ($router) {
            require app_path('Http/routes.php');
        });
        /*$router->group(['namespace' => 'App\Admin\Http\Controllers'], function ($router) {
            require app_path('Admin/Http/routes.php');
        });

        $router->group(['namespace' => 'App\Frontend\Http\Controllers'], function ($router) {
            require app_path('Frontend/Http/routes.php');
        });

        $router->group(['namespace' => 'App\API\Http\Controllers'], function ($router) {
            require app_path('API/Http/routes.php');
        });*/
    }
}
