<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class CoreValue
{
    public static function all()
    {
        return CoreValue::all();
    }

    public static function paginate($profile_id, $per_page=15)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        return $profile->core_values()->paginate($per_page);
    }

    public static function create(array $core_values, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create core_values
        $core_values = $profile->core_values()->create($core_values);

        //failure
        if(!$core_values) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_core_value, $profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$core_value = $profile->core_values()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        return $core_value->update($updated_core_value);
    }


    public static function destroy($profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$core_value = $profile->core_values()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $core_value->delete();

        return true;
    }
}
