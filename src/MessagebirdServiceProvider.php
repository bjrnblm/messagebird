<?php

namespace Bjrnblm\Messagebird;

use Illuminate\Support\ServiceProvider;

class MessagebirdServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/messagebird.php' => config_path('messagebird.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->bind('messagebird', function($app){
            $client = new \MessageBird\Client($app['config']['messagebird']['access_key']);
            return new Messagebird($client);
        });
    }

}