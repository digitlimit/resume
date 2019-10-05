<?php namespace App\Service;

use App\Models\Profile;
use Exception;

class Social
{
    public static function all()
    {
        return Social::all();
    }

    public static function paginate($profile_id, $per_page=15)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        return $profile->socials()->paginate($per_page);
    }

    public static function create(array $socials, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create socials
        $socials = $profile->socials()->create($socials);

        //failure
        if(!$socials) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_social, $profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$social = $profile->socials()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        return $social->update($updated_social);
    }


    public static function destroy($profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$social = $profile->socials()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $social->delete();

        return true;
    }
}