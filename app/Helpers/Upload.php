<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Upload
 */
class Upload
{
    /**
     * Upload profile picture and return filename
     */
    public static function profilePhoto(UploadedFile $file): bool|string
    {
        $directory_path = config('resume.assets.images.profile.photo.path');
        $disk = config('resume.assets.images.profile.photo.disk');

        $ext = $file->getClientOriginalExtension();

        $filename = substr(Str::random(16), 0, 100).
            '-'.'photo'.
            '-'.date('Y-m-d-His').
            '.'.$ext;

        if (Storage::disk($disk)->exists($directory_path)) {
            Storage::disk($disk)->makeDirectory($directory_path);
        }

        if (! $file->storeAs($directory_path, $filename, $disk)) {
            return false;
        }

        return $filename;
    }
}
