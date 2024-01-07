<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class Summary
{
    public static function create(array $summary, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create summary
        $summary = $profile->summary()->create($summary);

        //failure
        if(!$summary) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $summary, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create summary
        $summary = $profile->summary()->update($summary);

        //failure
        if(!$summary) return false;

        //perform other tasks like send email
        return true;
    }
}
