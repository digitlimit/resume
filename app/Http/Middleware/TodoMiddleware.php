<?php

namespace App\Http\Middleware;

use Closure;
use Alert;

class TodoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {

            //current user
            $user = auth()->user();

            //we want to redirect user to create profile if they
            //have not already done so
            if(!$user->profile){

                Alert::form('To continue, kindly create a profile', 'Todo')
                    ->info()
                    ->closable();

                return redirect()
                    ->route('common.profile.create');
            }

        }

        return $next($request);
    }
}
