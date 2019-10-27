<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Digitlimit\Place\PlaceManager;
use Digitlimit\Place\Contracts\Factory;
use App\Providers\Here;
use Illuminate\Support\Arr;

class HerePlaceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app[Factory::class]->extend('here', function ($app)
        {

            return new Here($app['request'],
                'rerererere',
                Arr::get(config('place'), 'guzzle', []));
        });
    }
}
