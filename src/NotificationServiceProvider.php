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

        $this->publishConfig();

        $this->loadViewsFrom(__DIR__.'/Views', 'grigio');

    }

    private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([$path => config_path('grigionotification.php')], 'config');
    }

    private function getConfigPath()
    {
        return __DIR__ . '/config/config.php';
    }
}
