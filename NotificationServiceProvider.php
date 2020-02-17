<?php

namespace Grigio\Notifications;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        App::bind('notification', function () {
            return new NotificationFacade;
        });
    }
}
