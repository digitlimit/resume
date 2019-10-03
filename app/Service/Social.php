<?php namespace App\Service;

use App\Models\Profile;
use Exception;

class Social
{
    public static function create(array $social, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create social
        $social = $profile->social()->create($social);

        //failure
        if(!$social) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $social, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create social
        $social = $profile->social()->update($social);

        //failure
        if(!$social) return false;

        //perform other tasks like send email
        return true;
    }
}