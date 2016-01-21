<?php

namespace App\Http\Controllers;

use Library\Image as Image;

trait ImageUpload
{
    protected $path = '';

    protected function upload($file, $i)
    {
        $fileName = date('His.dmY') . '.' . $i . '.jpg';
        $image = new Image();

        $image->setFile($file);
        $image->setPath($this->path);

        $image->upload(Image::LARGE."{$fileName}");
        $image->fit(Image::MEDIUM)->upload(Image::MEDIUM."{$fileName}");
        $image->fit(Image::SMALL)->upload(Image::SMALL."{$fileName}");

        return $fileName;
    }

    protected function delete($file)
    {
        $image = new Image();

        $image->setPath($this->path);

        $image->delete(Image::LARGE."{$file}");
        $image->delete(Image::MEDIUM."{$file}");
        $image->delete(Image::SMALL."{$file}");
    }
}
