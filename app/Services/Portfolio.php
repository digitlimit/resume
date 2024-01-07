<?php

namespace App\Services;

use App\Models\Profile;
use Exception;

class Portfolio
{
    public static function all()
    {
        return Portfolio::all();
    }

    public static function paginate($profile_id, $per_page=15)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        return $profile->portfolios()->paginate($per_page);
    }

    public static function create(array $portfolios, $profile_id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        //create portfolios
        $portfolios = $profile->portfolios()->create($portfolios);

        //failure
        if(!$portfolios) return false;

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_portfolio, $profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$portfolio = $profile->portfolios()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        return $portfolio->update($updated_portfolio);
    }


    public static function destroy($profile_id, $id)
    {
        //ensure profile exists
        if(! $profile = Profile::find($profile_id)){
            //todo localize
            throw new Exception("Profile with ID '$profile_id' not found");
        }

        if(!$portfolio = $profile->portfolios()->find($id)){
            throw new Exception("Work Experience with ID '$id' not found");
        }

        $portfolio->delete();

        return true;
    }
}
