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


    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authWorkExperiences($id=null)
    {
        $profile = $this->authProfile();

        if(!$profile){
            return null;
        }

        if($id && $profile){
            return $profile->work_experiences()->find($id);
        }

        return $profile->work_experiences;
    }


    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authEducations($id=null)
    {
        $profile = $this->authProfile();

        if(!$profile){
            return null;
        }

        if($id && $profile){
            return $profile->educations()->find($id);
        }

        return $profile->educations;
    }


    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authSkills($id=null)
    {
        $profile = $this->authProfile();

        if(!$profile){
            return null;
        }

        if($id && $profile){
            return $profile->skills()->find($id);
        }

        return $profile->skills;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authSocials($id=null)
    {
        $profile = $this->authProfile();

        if(!$profile){
            return null;
        }

        if($id && $profile){
            return $profile->socials()->find($id);
        }

        return $profile->socials;
    }

    /**
     * Return current authenticated user's contact
     *
     * @return null
     */
    public function authCoreValues($id=null)
    {
        $profile = $this->authProfile();

        if(!$profile){
            return null;
        }

        if($id && $profile){
            return $profile->core_values()->find($id);
        }

        return $profile->core_values;
    }
}