<?php

namespace App\Composers;

use Illuminate\View\View;

/**
 * Make $user variable available in all the views
 * for all authenticated users.
 */
class AuthComposer
{
    protected $users;

    /**
     * Binds data to the view
     *
     * @param View $view object an instance of Illuminate\View\View
     * @return void
     */
    public function compose(View $view)
    {
        $user = auth()->user();

        $view->with('me', $user);
    }
}