<?php namespace App\Service;

use App\Models\Profile;
use Exception;

class Portfolio
{
    public static function create(array $portfolio, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create portfolio
        $portfolio = $profile->portfolio()->create($portfolio);

        //failure
        if(!$portfolio) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $portfolio, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create portfolio
        $portfolio = $profile->portfolio()->update($portfolio);

        //failure
        if(!$portfolio) return false;

        //perform other tasks like send email
        return true;
    }
}