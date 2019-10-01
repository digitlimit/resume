<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
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
        view()->composer('*', 'App\Composers\AuthComposer');

        //custom validator
        validator()->extend('name', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z.]*)*$/i', $value);
        });

        validator()->extend('company', function ($attribute, $value, $parameters, $validator) {
            return preg_match("/^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/", $value);
        });

        validator()->extend('address', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^\d+\s[A-z]+\s[A-z]+/i', $value);
        });

//        validator()->extend('base64image', function ($attribute, $value, $parameters, $validator) {
//            try {
//                ImageManagerStatic::make($value);
//                return true;
//            } catch (\Exception $e) {
//                info($e->getMessage());
//                return false;
//            }
//        });
    }
}
