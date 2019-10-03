<?php namespace App\Service;

use App\Models\Profile;
use Exception;

class Interest
{
    public static function create(array $interest, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create interest
        $interest = $profile->interest()->create($interest);

        //failure
        if(!$interest) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $interest, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create interest
        $interest = $profile->interest()->update($interest);

        //failure
        if(!$interest) return false;

        //perform other tasks like send email
        return true;
    }
}