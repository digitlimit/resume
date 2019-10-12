<?php namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    /**
     * Delete profile photo file
     *
     * @param $filename
     * @return bool
     */
    public static function deleteProfilePhotoFile($filename)
    {
        $directory_path = config('resume.assets.images.profile.photo.path');
        $disk = config('resume.assets.images.profile.photo.disk');

        $path = $directory_path . "/" . $filename;

        //make directory if not exists
        if(!Storage::disk($disk)->exists($path)){
//            dd(7);
           return false;
        }

        //delete
        Storage::disk($disk)->delete($path);

        return true;
    }
}