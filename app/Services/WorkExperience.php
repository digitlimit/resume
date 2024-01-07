<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class WorkExperience
{
    public static function all()
    {
        return WorkExperience::all();
    }

    public static function paginate($profile_id, $per_page=15)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        return $profile->work_experiences()->paginate($per_page);
    }

    public static function create(array $work_experiences, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create work_experiences
        $work_experiences = $profile->work_experiences()->create($work_experiences);

        //failure
        if(!$work_experiences) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_work_experience, $profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$work_experience = $profile->work_experiences()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        return $work_experience->update($updated_work_experience);
    }


    public static function destroy($profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$work_experience = $profile->work_experiences()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $work_experience->delete();

        return true;
    }
}
