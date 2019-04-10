<?php

namespace SIAStar\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class NotificationViewComposeProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['guru.*','siswa.*'], 'SIAStar\Http\ViewComposers\NotificationComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
