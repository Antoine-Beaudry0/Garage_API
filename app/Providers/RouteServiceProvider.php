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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            $userId = null;
            
            // Essayez d'obtenir l'utilisateur avec le guard 'client'
            $client = auth('client')->user();
            if ($client) {
                $userId = $client->id;
            }
        
            // Sinon, essayez avec le guard 'garagiste'
            if (!$userId) {
                $garagiste = auth('garagiste')->user();
                if ($garagiste) {
                    $userId = $garagiste->id;
                }
            }
        
            return Limit::perMinute(60)->by($userId ?: $request->ip());
        });
        

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
