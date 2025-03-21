<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot()
    // {
    //     $this->routes(function () {
    //         Route::prefix('api')
    //             ->middleware('api')
    //             ->namespace($this->namespace)
    //             ->group(base_path('routes/api.php'));
    
    //         Route::middleware('web')
    //             ->namespace($this->namespace)
    //             ->group(base_path('routes/web.php'));
    //     });
    // }
}
