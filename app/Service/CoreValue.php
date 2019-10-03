<?php namespace App\Service;

use App\Models\Profile;
use Exception;

class CoreValue
{
    public static function create(array $core_value, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create core_values
        $core_value = $profile->core_values()->create($core_value);

        //failure
        if(!$core_value) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $core_value, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create core_values
        $core_value = $profile->core_values()->update($core_value);

        //failure
        if(!$core_value) return false;

        //perform other tasks like send email
        return true;
    }
}