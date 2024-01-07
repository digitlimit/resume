<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Models\Profile as Model;
use App\Models\User;
use Exception;
use Illuminate\Http\UploadedFile;
use App\Helpers\Upload;
use Illuminate\Support\Facades\Storage;

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

        $photo = isset($profile['photo']) ? $profile['photo'] : null;
        unset($profile['photo']);

        //create Profile
        $profile = $user->profile()->create($profile);

        //failure
        if(!$profile) return false;

        if($photo && $photo instanceof UploadedFile && $filename = Upload::profilePhoto($photo))
        {
            $user->profile->image()->create([
                'name' => $filename,
                'default' => true
            ]);
        }

        //perform other tasks like send email
        return true;
    }


    public static function update(array $updated_profile, $user_id)
    {
        //ensure user exists
        if(! $user = User::find($user_id)){
            //todo localize
            throw new Exception("User with ID '$user_id' not found");
        }

        $photo = isset($updated_profile['photo']) ? $updated_profile['photo'] : null;
        unset($updated_profile['photo']);

        //create Profile
        $profile = $user->profile()->update($updated_profile);

        //failure
        if(!$profile) return false;

        //TODO: clear old pic

        if($photo && $photo instanceof UploadedFile && $filename = Upload::profilePhoto($photo))
        {
            if($image = $user->profile->image){
                //delete file from disk
                Helper::deleteProfilePhotoFile($image->name);
            }

            $user->profile->image()->update([
               'name' => $filename,
               'default' => true
           ]);
        }

        //perform other tasks like send email
        return $profile;
    }
}
