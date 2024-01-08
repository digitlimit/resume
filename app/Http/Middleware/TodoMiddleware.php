<?php
declare(strict_types=1);
namespace App\Http\Middleware;

use Closure;
use Digitlimit\Alert\Facades\Alert;
use Illuminate\Http\Request;

class TodoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (auth()->check()) {
            //current user
            $user = auth()->user();

            //we want to redirect user to create profile if they
            //have not already done so
            if(!$user->profile){

                Alert::message('To continue, kindly create a profile')
                    ->info()
                    ->flash();

                return redirect()
                    ->route('common.profile.create');
            }

        }

        return $next($request);
    }
}
