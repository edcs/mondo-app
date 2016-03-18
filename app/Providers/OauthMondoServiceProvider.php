<?php

namespace Edcs\MondoApp\Providers;

use Edcs\OAuth2\Client\Provider\Mondo;
use Illuminate\Support\ServiceProvider;

class OauthMondoServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Mondo::class, function ($app) {
            $provider = new Mondo([
                'clientId'     => $app['config']['services']['mondo']['client_id'],
                'clientSecret' => $app['config']['services']['mondo']['client_secret'],
                'redirectUri'  => route('oauth.callback'),
            ]);

            return $provider;
        });
    }
}
