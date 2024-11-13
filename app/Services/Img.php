<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class Img
{
    private static function normalizeFileName(UploadedFile $file)
    {
        $fileInfo = pathinfo($file->getClientOriginalName());
        $fileName = $fileInfo['filename'] ?? null;

        $fileName = Str::slug(Str::words($fileName, 10, ''));
        if (! $fileName || empty($fileName)) {
            $fileName = self::uniqueFileName();
        } else {
            $fileName = uniqid("{$fileName}-");
        }

        return $fileName .= '.png';
    }

    private static function uniqueFileName(): string
    {
        return 'upload-'.md5(uniqid());
    }

    private static function create($file)
    {
        $manager = new ImageManager(new Driver);
        $image = $manager->read($file);

        return $image;
    }

    /**
     * Uploads an image to the storage public path.
     * All uplaoded file will encoded to png.
     *
     * @param  string|null  $path
     * @param  bool  $default_naming
     * @return string
     */
    public static function upload(UploadedFile $file, $path = null, $default_naming = false)
    {
        $path = $path ?? '/images';
        if ($default_naming) {
            $path = $path.'/'.self::uniqueFileName();
        } else {
            $path = $path.'/'.self::normalizeFileName($file);
        }

        $image = self::create($file);
        $image = $image->toPng()->toString();

        Storage::disk('public')->put($path, $image);

        return $path;
    }
}
