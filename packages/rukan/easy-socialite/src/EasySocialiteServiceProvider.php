<?php

namespace Rukan\EasySocialite;

use Illuminate\Support\ServiceProvider;

class EasySocialiteServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('Rukan\EasySocialite\Contracts\Factory', function ($app) {
            return new EasySocialiteManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Rukan\EasySocialite\Contracts\Factory'];
    }
}
