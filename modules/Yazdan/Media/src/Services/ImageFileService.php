<?php

namespace Yazdan\Media\Services;

use Illuminate\Support\Facades\Storage;
use Yazdan\Media\App\Models\Media;
use Yazdan\Media\Contracts\FileServiceContract;

class ImageFileService extends DefaultFileService implements FileServiceContract
{
    public static $sizes = ['60', '300', '600'];

    public static $ext;

    public static function upload($file, $dir, $filename): array
    {
        self::$ext = strtolower($file->getClientOriginalExtension());

        $fileFullName = $filename . '.' . self::$ext;
        Storage::putFileAs($dir, $file, $fileFullName);
        return static::resize($fileFullName, $dir);
    }

    public static function resize($file, $dir)
    {
        $img = Storage::path($dir) . $file;
        $images['original'] = $file;

        foreach (static::$sizes as $size) {


            list($width, $height) = getimagesize($img);

            $newwidth = $size;
            $newheight = ($height * $size) / $width;

            $thumb = imagecreatetruecolor($newwidth, $newheight);

            // Remove black BG og png image
            if (self::$ext == 'png') {
                $background = imagecolorallocate($thumb, 0, 0, 0);

                imagecolortransparent($thumb, $background);

                imagealphablending($thumb, false);

                imagesavealpha($thumb, true);
            }

            // Diffrent fuction for png & jpg
            $source = self::$ext == 'png' ? imagecreatefrompng($img) : imagecreatefromjpeg($img);

            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

            $fileSizeName = $size . '_' . $file;

            $fileSizePath = Storage::path($dir) . $fileSizeName;

            // Diffrent fuction for png & jpg
            self::$ext == 'png' ? imagepng($thumb, $fileSizePath) : imagejpeg($thumb, $fileSizePath);

            $images[$size] = $fileSizeName;
        }

        return $images;
    }


    public static function thumb(Media $media, $size)
    {

        $a = collect(self::$sizes)->map(function ($item) use ($size) {
            return $size == $item;
        });

        if (!in_array(true, $a->toArray())) $size = 'original';

        return env('BANNER_PATH') . $media->files[$size];
    }

    public static function getFilename()
    {
        return self::$media->access . '/' . self::$media->files['original'];
    }
}
