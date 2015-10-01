<?php

use Library\Image as Image;

class ImageHelper
{
    public static function avatar($resource, $userId, $images)
    {
        $endpoint = config('filesystems.disks.s3.endpoint');

        switch ($resource) {
            case ResourceOption::DU_AN:
                $path = config('image.paths.project');
                break;
        }

        if (0 < count($images)) {
            // used first image as avatar
            return "{$endpoint}/{$path}/{$userId}/".Image::MEDIUM.$images[0];
        } else {
            return "{$endpoint}/{$path}/default/".Image::MEDIUM.'.'.Image::FORMAT;
        }
    }

    public static function url($resource, $userId, $image, $size)
    {
        $endpoint = config('filesystems.disks.s3.endpoint');

        switch ($resource) {
            case ResourceOption::DU_AN:
                $path = config('image.paths.project');
                break;
        }

        return "{$endpoint}/{$path}/{$userId}/{$size}{$image}";
    }

    public static function link($path)
    {
        $endpoint = config('filesystems.disks.s3.endpoint');

        return $endpoint.'/'.$path;
    }

    /**
     * @param string $resource
     * @param string $tmpPath
     * @return string filename image uploaded
     */
    public function uploads($resource, $tmpPath)
    {
        $fileName = '';
        if (!empty($_FILES['avatar']['tmp_name'])) {
            $user = Auth::user();
            $now = date('His.dmY');
            $fileName = "{$user->id}.{$now}.jpg";
            $image = \Image::make($tmpPath);

            switch ($resource) {
                case 'user':
                    $avatarSize = config('image.sizes.avatar');
                    $path = config('image.paths.user');
                    $avatar = $user->avatar;
                    break;
                case 'company':
                    $avatarSize = config('image.sizes.medium');
                    $path = config('image.paths.company');
                    $avatar = $user->company->avatar;
                    break;
            }

            $img = (string) $image->fit($avatarSize['w'], $avatarSize['h'])->encode('jpg', self::QUANLITY);
            Storage::put($path.'/'.$fileName, $img);

            // delete old file avatar if exist
            $this->delete($path.'/'.$avatar);
        }

        return $fileName;
    }
}
