<?php namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Image
{

    /**
     * Profile photo
     *
     * @param $filename
     * @return string
     */
    public static function profile($filename)
    {
        $directory_path = config('resume.assets.images.profile.photo.path');
        $disk = config('resume.assets.images.profile.photo.disk');
        $default = config('resume.assets.images.profile.photo.default');

        $path = $directory_path . '/' . $filename;

        if(!Storage::disk($disk)->exists($path)){
            return asset($default);
        }

        return asset(Storage::url($path));
    }
}