<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
	const QUANLITY = 100;

	/**
	 * Note: Passing by Reference
	 * @param array $data
	 */
	protected function uploadImage(&$data)
	{
		$width = config('image.sizes.medium.w');
		$height = config('image.sizes.medium.h');
		$basepath = config('image.paths.house');
		$userId = Auth::user()->id;
		$now = date('His.dmY');
		$i = 0;

		foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
			if (!empty($tmpPath)) {
				$image = \Image::make($tmpPath);
				$fileName = $userId . '.' . $now . '.' . $i++ . '.jpg';
				$image->fit($width, $height)
					->save($basepath.$fileName, self::QUANLITY);

				array_push($data['images'], $fileName);
			}
		}
	}
}
