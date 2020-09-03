<?php

namespace JWTFlags\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use JWTFlags\Http\Middleware\HasFlag;
use JWTFlags\Factory\FlagsFactory;
use JWTFlags\Flags;

class JWTFlagsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(FlagsFactory::class)
            ->needs('$relation')
            ->give(config('jwt.flags.relation'));

        $this->app->singleton('jwt.flags', Flags::class);
        $this->app->bind('jwt.flags', HasFlag::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '../../config/jwt-flags.php' => config_path('jwt-flags.php'),
        ]);

        $this->publishes([
            __DIR__ . '../../resources/lang' => resource_path('lang/vendor/jwt-flags'),
        ]);

        $this->loadTranslationsFrom(__DIR__ . '../../resources/lang', 'jwt-flags');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['jwt.flags'];
    }
}
