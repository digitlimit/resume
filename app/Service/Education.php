<?php namespace App\Service;

use App\Models\Profile;
use Exception;

class Education
{
    public static function create(array $education, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create education
        $education = $profile->education()->create($education);

        //failure
        if(!$education) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $education, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create education
        $education = $profile->education()->update($education);

        //failure
        if(!$education) return false;

        //perform other tasks like send email
        return true;
    }
}