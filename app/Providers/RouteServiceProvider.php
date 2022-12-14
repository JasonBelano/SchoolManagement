<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('api/student')

              ->middleware(['api', 'auth:student-api', 'scopes:student'])
              ->namespace($this->namespace)
              ->group(base_path('routes/api/student.php'));

            Route::prefix('api/user')
                 ->middleware(['api', 'auth:user-api', 'scopes:user'])
                 ->namespace($this->namespace)
                 ->group(base_path('routes/api/user.php'));
            
            Route::prefix('api/unauth/student')
                 ->middleware(['api'])
                 ->namespace($this->namespace)
                 ->group(base_path('routes/unauth.php'));
            
    
        });
        
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
