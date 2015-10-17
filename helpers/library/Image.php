<?php
namespace Library;

use Image as InterventionImage;
use Storage;

class Image
{
    const QUANLITY = 100;
    const FORMAT = 'jpg';
    const LARGE = 'large';
    const MEDIUM = 'medium';
    const SMALL = 'small';
    const AVATAR = 'avatar';

    public $large = [];
    public $medium = [];
    public $small = [];
    public $avatar = [];

    /**
     * @var \Intervention\Image\Image a Image instance
     */
    public $image;

    public $path = '';

    public function __construct()
    {
        $this->large = config('image.sizes.large');
        $this->medium = config('image.sizes.medium');
        $this->small = config('image.sizes.small');
        $this->avatar = config('image.sizes.avatar');
    }

    public function setFile($file = '')
    {
        $this->image = InterventionImage::make($file);
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function fit($size)
    {
        switch ($size) {
            case self::LARGE:
                $this->image->fit($this->large['w'], $this->large['h']);
                break;
            case self::MEDIUM:
                $this->image->fit($this->medium['w'], $this->medium['h']);
                break;
            case self::SMALL:
                $this->image->fit($this->small['w'], $this->small['h']);
                break;
            case self::AVATAR:
                $this->image->fit($this->avatar['w'], $this->avatar['h']);
                break;
        }

        return $this;
    }

    /**
     * Upload files by path
     *
     * @param string $file filename
     */
    public function upload($file = '')
    {
        Storage::put("{$this->path}/{$file}", (string) $this->image->encode( self::FORMAT, self::QUANLITY));
    }

    /**
     * Delete files by path
     *
     * @param array $file
     */
    public function delete($file = '')
    {
        if (Storage::exists("{$this->path}/{$file}")) {
            Storage::delete("{$this->path}/{$file}");
        }
    }
}
