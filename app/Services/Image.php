<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class Image
{
    public static function create(array $image, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create image
        $image = $profile->image()->create($image);

        //failure
        if(!$image) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $image, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create image
        $image = $profile->image()->update($image);

        //failure
        if(!$image) return false;

        //perform other tasks like send email
        return true;
    }
}
