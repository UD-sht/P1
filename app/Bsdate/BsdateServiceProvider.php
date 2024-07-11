<?php

namespace App\Bsdate;

use Illuminate\Support\ServiceProvider;
use App\Bsdate\BsdateController;

class BsdateServiceProvider extends ServiceProvider
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
        $this->app->bind('bsdate', function () {
            return new BsdateController();
        });
    }
}
