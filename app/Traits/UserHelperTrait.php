<?php namespace App\Traits;

trait UserHelperTrait{

    /**
     * Get current authenticated user
     *
     * @return mixed
     */
    public function authUser()
    {
        return request()->user();
    }

    /**
     * Return current authenticated user's profile
     *
     * @return null
     */
    public function authProfile()
    {
        $user = request()->user();

        return $user ? $user->profile : null;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authContact()
    {
        $profile = $this->authProfile();

        return $profile ? $profile->contact : null;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authSummary()
    {
        $profile = $this->authProfile();

        return $profile ? $profile->summary : null;
    }


//    /**s
//     * Return current authenticated user's contact
//     *
//     * @return null
//     */
//    public function authContact()
//    {
//        $profile = $this->authProfile();
//
//        return $profile ? $profile->contact : null;
//    }
}