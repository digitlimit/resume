<?php namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Upload
{
    /**
     * Upload profile picture and return filename
     *
     * @param UploadedFile $file
     * @return bool|string
     */
    public static function profilePhoto(UploadedFile $file)
    {
        $directory_path = config('resume.assets.images.profile.photo.path');
        $disk = config('resume.assets.images.profile.photo.disk');

        $ext = $file->getClientOriginalExtension();

        //generate unique file name
        $filename = substr(Str::random(16), 0, 100) .
            '-' . 'photo' .
            '-' . date("Y-m-d-His") .
            '.' . $ext;

        //make directory if not exists
        if(Storage::disk($disk)->exists($directory_path)){
            Storage::disk($disk)->makeDirectory($directory_path);
        }

        //upload profile pix
        if(!$path = $file->storeAs($directory_path, $filename, $disk))
        {
            return false;
        }

        return $filename;
    }

}