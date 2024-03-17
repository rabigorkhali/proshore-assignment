<?php

namespace App\Traits;

use File;
use Image;
use Request;

trait ImageTrait
{
    public function uploadImage($dir, $input)
    {
        /* $directory = public_path() . $dir;
        if (is_dir($directory) != true) {
            \File::makeDirectory($directory, $mode = 0755, true);
        }
        $fileName = uniqid() . '.' . Request::file($input)->getClientOriginalExtension();
        $image = Image::make(Request::file($input));
        $image->save($directory . '/' . $fileName, 100);

        return $fileName; */

        $directory = public_path() . $dir;
        if (is_dir($directory) != true) {
            \File::makeDirectory($directory, $mode = 0755, true);
        }
        $fileName = uniqid() . '.' . Request::input($input)->getClientOriginalExtension();
        $image = Image::make(Request::input($input));
        $image->save($directory . '/' . $fileName, 100);

        return $fileName;
    }

    public function uploadImageByInstance($dir, $image)
    {
        $directory = public_path() . $dir;
        if (is_dir($directory) != true) {
            \File::makeDirectory($directory, $mode = 0755, true);
        }
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image);
        $image->save($directory . '/' . $fileName, 100);

        return $fileName;
    }


    public function uploadEmployeeImage($dir, $input, $trackingCode)
    {
        $directory = public_path() . $dir;
        if (is_dir($directory) != true) {
            \File::makeDirectory($directory, $mode = 0755, true);
        }
        $fileName = $trackingCode . '.' . Request::file($input)->getClientOriginalExtension();
        $image = Image::make(Request::file($input));
        $image->save($directory . '/' . $fileName, 100);
        return $fileName;
    }

    public function uploadConfigImage($dir, $input)
    {
        $directory = public_path() . $dir;
        if (is_dir($directory) != true) {
            \File::makeDirectory($directory, $mode = 0755, true);
        }
        $fileName = uniqid() . '.' . $input->getClientOriginalExtension();
        $image = Image::make($input);
        $image->save($directory . '/' . $fileName, 100);

        return $fileName;
    }

    public function removeImage($dir, $image)
    {
        $f1 = public_path() . $dir . '/' . $image;
        File::delete($f1);
    }
}
