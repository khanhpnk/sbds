<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use App\Banner;
use Library\Image;
use App\Http\Controllers\ImageUpload;

class BannerController extends BaseController
{
	use ImageUpload;
	
	public function __construct()
	{
		$this->path = config('image.paths.banner');
	}
	
    /**
     * Show the form for editing the resource.
     *
     * @return Response
     */
    public function edit()
    {
        $banner = Banner::find(1);

        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $banner = Banner::find(1);

		$data = $request->all();
		$data['images'] = $banner->images ? $banner->images : [];
		
		$i = 0;

		$files = json_decode($data['files_deleted']);
		foreach ($files as $file) {
			if (($key = array_search($file, $data['images'])) !== false) {
				unset($data['images'][$key]);
				
				$image = new Image();
				$image->setPath($this->path);
				$image->delete($file);
			}
		}

		foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
			if (!empty($tmpPath)) {
				$fileName = date('His.dmY') . '.' . $i++ . '.jpg';
				$image = new Image();
				$image->setFile($tmpPath);
				$image->setPath($this->path);
				$image->fit(Image::BANNER)->upload($fileName);
				array_push($data['images'], $fileName);
			}
		}

		// Hàm unset() khiến key của array ko còn là dãy số liên tiếp
		// Lúc này Laravel sẽ ko đối xử và lưu 'images' như kiểu array mà là kiểu Json, cần sửa chữa vấn đề này
		$data['images'] = array_values($data['images']);

		$banner->fill($data)->save();

        return Redirect::back()->with('flash_message', Lang::get('system.update'));
    }
}
