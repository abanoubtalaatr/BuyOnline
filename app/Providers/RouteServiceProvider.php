<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $namespaceBackEndAdmin = 'App\Http\Controllers\backEnd\Admin';
    protected $namespaceBackEndCategory = 'App\Http\Controllers\backEnd\Category';
    protected $namespaceBackEndProduct = 'App\Http\Controllers\backEnd\Product';
    protected $namespacefrontEndProduct = 'App\Http\Controllers\frontEnd\product';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapBackEndAdminRoutes();
        $this->mapBackEndCategoryRoutes();
        $this->mapBackEndProductRoutes();
        $this->mapFrontEndProductRoutes();
        $this->mapWebRoutes();


        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // this for main routes
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    // this for admin routes 
    protected function mapBackEndAdminRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespaceBackEndAdmin)
             ->group(base_path('routes/backEnd/Admin/Admin.php'));
    }
    // this for category routes
    protected function mapBackEndCategoryRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespaceBackEndCategory)
             ->group(base_path('routes/backEnd/Category/Category.php'));
    }
    // this for product routes
    protected function mapBackEndProductRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespaceBackEndProduct)
             ->group(base_path('routes/backEnd/Product/Product.php'));
    }
    // this for product routes
    protected function mapFrontEndProductRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespacefrontEndProduct)
             ->group(base_path('routes/frontEnd/product/product.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
