<?php namespace SSX\ThreeOhOne\Providers;

use Illuminate\Support\ServiceProvider;

class ThreeOhOneServiceProvider extends ServiceProvider {

    public function register()
    {
        // Intentionally left empty
    }

    public function boot() {
        /*
         * To load this without requiring user to add it to Kernel.php, we can hijack an existing middleware
         * and then add our own logic.
         *
         * $this->app->singleton('Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode', function($app){
         *
         *   return  new PackageMiddleware($app);
         *
         * });
         */

        $this->publishes([
            __DIR__.'/../Migrations/' => database_path('migrations')
        ], 'migrations');
    }

}
