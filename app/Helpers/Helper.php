<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

/**
 * Class Helper
 */
class Helper
{
    /**
     * Delete profile photo file
     */
    public static function deleteProfilePhotoFile(string $filename): bool
    {
        $directory_path = config('resume.assets.images.profile.photo.path');
        $disk = config('resume.assets.images.profile.photo.disk');

        $path = $directory_path.'/'.$filename;

        if (! Storage::disk($disk)->exists($path)) {
            return false;
        }

        Storage::disk($disk)->delete($path);

        return true;
    }
}
