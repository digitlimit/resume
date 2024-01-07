<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class Skill
{
    public static function all()
    {
        return Skill::all();
    }

    public static function paginate($profile_id, $per_page=15)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        return $profile->skills()->paginate($per_page);
    }

    public static function create(array $skills, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create skills
        $skills = $profile->skills()->create($skills);

        //failure
        if(!$skills) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_skill, $profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$skill = $profile->skills()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        return $skill->update($updated_skill);
    }


    public static function destroy($profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$skill = $profile->skills()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $skill->delete();

        return true;
    }
}
