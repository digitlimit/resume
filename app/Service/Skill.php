<?php namespace App\Service;

use App\Models\Profile;
use Exception;

class Skill
{
    public static function create(array $skill, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create skill
        $skill = $profile->skill()->create($skill);

        //failure
        if(!$skill) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $skill, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create skill
        $skill = $profile->skill()->update($skill);

        //failure
        if(!$skill) return false;

        //perform other tasks like send email
        return true;
    }
}