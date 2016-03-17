<?php

namespace Edcs\MondoApp\Providers;

use GuzzleHttp\Client;
use Http\Client\HttpClient;
use Illuminate\Support\ServiceProvider;

class HttpClientSerivceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HttpClient::class, function ($app) {
            $client = new Client([
                'base_uri' => $app['config']['services']['mondo']['base_uri'],
                'headers'  => [
                    'Authorization' => "Bearer {$app['session']->get('oauth.token.access_token')}",
                ]
            ]);

            $client = new \Http\Adapter\Guzzle6\Client($client);

            return $client;
        });
    }
}
