<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class Education
{
    public static function all()
    {
        return Education::all();
    }

    public static function paginate($profile_id, $per_page=15)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        return $profile->educations()->paginate($per_page);
    }

    public static function create(array $educations, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create educations
        $educations = $profile->educations()->create($educations);

        //failure
        if(!$educations) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_education, $profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$education = $profile->educations()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        return $education->update($updated_education);
    }


    public static function destroy($profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$education = $profile->educations()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $education->delete();

        return true;
    }
}
