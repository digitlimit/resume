<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Digitlimit\Place\PlaceManager;
use Digitlimit\Place\Contracts\Factory;
use App\Providers\Azure;
use Illuminate\Support\Arr;

class AzurePlaceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app[Factory::class]->extend('azure', function ($app)
        {

            return new Azure($app['request'],
                'rerererere',
                Arr::get(config('place'), 'guzzle', []));
        });
    }
}
