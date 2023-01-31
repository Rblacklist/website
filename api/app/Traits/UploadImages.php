<?php

namespace App\Traits;

use Buglinjo\LaravelWebp\Webp;
use Intervention\Image\ImageManagerStatic as Image;


trait UploadImages
{

    public static function image($file, string $path, $width, $height): string
    {

        $imageName = uniqid('img_') . time() . '.' . $file->extension();

        $destinationPath = public_path($path);
        $img = Image::make($file->path());

        $img->resize($width, $height, function ($constraint) {

            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imageName);

        return $imageName;
    }

    public static function file($file, string $path): string
    {
        if (!empty($file)) {
            $fileName = uniqid('file_') . time() . '.webp';
            $webp = Webp::make($file);
            if ($webp->save(public_path($path) . '/' . $fileName)) {
                return $fileName ;
            }
        }
        return '';
    }

    public static function images($files, string $path, $width, $height): array
    {
        $imageNames = [];
        foreach ($files as $file) {
            $imageName = uniqid('img_') . time() . '.' . $file->extension();
            $imageNames[] = $imageName;
            $destinationPath = public_path($path);
            $img = Image::make($file->path());

            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);
        }

        return $imageNames;
    }
}
