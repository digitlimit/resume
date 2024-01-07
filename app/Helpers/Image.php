<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

/**
 * Class Image
 */
class Image
{
    /**
     * Profile photo
     */
    public static function profile(string $filename): string
    {
        $directory_path = config('resume.assets.images.profile.photo.path');
        $disk = config('resume.assets.images.profile.photo.disk');
        $default = config('resume.assets.images.profile.photo.default');

        $path = $directory_path.'/'.$filename;

        if (! Storage::disk($disk)->exists($path)) {
            return asset($default);
        }

        return asset(Storage::url($path));
    }
}
