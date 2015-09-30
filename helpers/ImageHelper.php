<?php

class ImageHelper
{
    const QUANLITY = 100;

    public static function image($image, $userId, $type, $sizes)
    {
        switch ($type) {
            case 'house':
                $path = url('upload/'.config('image.paths.house').'/'.$userId);
                break;
        }

        if (is_array($image)) { // get first image for list
            if (0 < count($image)) {
                return asset($path.'/'.$sizes.$image[0]);
            } else {
                return asset("upload/$type/default/$sizes.jpg");
            }
        } else { // indicate a image
            return asset($path.'/'.$sizes.$image);
        }
    }

    /**
     * @param string $resource
     * @param string $tmpPath
     * @return string filename image uploaded
     */
    public function upload($resource, $tmpPath)
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
            Storage::put($path . $fileName, $img);

            // delete old file avatar if exist
            $this->delete($path.$avatar);
        }

        return $fileName;
    }

    /**
     * Delete one file by path
     *
     * @param string $file
     */
    public function delete($file)
    {
        if (Storage::exists($file)) {
            Storage::delete($file);
        }
    }
}
