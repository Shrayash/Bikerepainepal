<?php
namespace App\Providers;

use App\Auth\PasswordBrokerManager;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider as PasswordResetServiceProviderBase;

class PasswordResetServiceProvider extends PasswordResetServiceProviderBase
{
    protected function registerPasswordBroker()
    {
        $this->app->singleton('auth.password', function ($app) {
            // reference your new broker
            // the rest of the method code is unchanged
            return new PasswordBrokerManager($app);
        });
        $this->app->bind('auth.password.broker', function ($app) {
            return $app->make('auth.password')->broker();
        });
    }
}