<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class Interest
{
    public static function all()
    {
        return Interest::all();
    }

    public static function paginate($profile_id, $per_page=15)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        return $profile->interests()->paginate($per_page);
    }

    public static function create(array $interests, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create interests
        $interests = $profile->interests()->create($interests);

        //failure
        if(!$interests) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_interest, $profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$interest = $profile->interests()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        return $interest->update($updated_interest);
    }


    public static function destroy($profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$interest = $profile->interests()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $interest->delete();

        return true;
    }
}
