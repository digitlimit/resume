<?php

namespace App\Services;

use App\Models\Profile;
use App\Models\User;
use Exception;

class Contact
{

    public static function default()
    {
        return Model::find(1);
    }

    public static function create(array $contact, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create Contact
        $contact = $profile->contact()->create($contact);

        //failure
        if(!$contact) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $contact, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create Contact
        $contact = $profile->contact()->update($contact);

        //failure
        if(!$contact) return false;

        //perform other tasks like send email
        return true;
    }
}
