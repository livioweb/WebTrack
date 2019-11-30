<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class GuzzleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('HttpCrapping', function () {
            return new Client([
                'base_uri' =>"",
                'headers' => [ 'Content-Type' => 'application/json' ],
                'timeout'  => 120,
                'connect_timeout' =>120,
                //'debug' => true,
                "config"          => [
                    "curl"        => [
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_TIMEOUT_MS => 0,
                        CURLOPT_CONNECTTIMEOUT => 0,
                    ]
                ],
                'http_errors' => true
            ]);
        });
    }
}
