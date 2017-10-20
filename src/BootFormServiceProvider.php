<?php

namespace AGD\BootForm;

use Illuminate\Support\ServiceProvider;

class BootFormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BootForm::class, function () {
            return new BootForm();
        });
        $this->app->alias(BootForm::class, 'BootForm');
    }
}
