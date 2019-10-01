<?php namespace App\Service;

use App\Models\Profile as Model;
use App\Models\User;
use Exception;

class Profile
{

    public static function default()
    {
        return Model::find(1);
    }

    public static function create(array $profile, $user_id)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        //create Profile
        $profile = $user->profile()->create($profile);

        //failure
        if(!$profile) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $profile, $user_id)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        //create Profile
        $profile = $user->profile()->update($profile);

        //failure
        if(!$profile) return false;

        //perform other tasks like send email
        return true;
    }
}