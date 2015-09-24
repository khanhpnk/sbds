<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\House;

class BaseController extends Controller
{
	const QUANLITY = 100;

	/**
	 * Note: Passing by Reference
	 * @param array $data
	 */
	protected function uploadImage(&$data)
	{
		$largeWidth = config('image.sizes.large.w');
		$largeHeight = config('image.sizes.large.h');
		$mediumWidth = config('image.sizes.medium.w');
		$mediumHeight = config('image.sizes.medium.h');
		$smallWidth = config('image.sizes.small.w');
		$smallHeight = config('image.sizes.small.h');
		$basepath = public_path(config('image.paths.house'));
		$userId = Auth::user()->id;
		$now = date('His.dmY');
		$i = 0;

		foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
			if (!empty($tmpPath)) {
				$image = \Image::make($tmpPath);
				$fileName = $userId . '.' . $now . '.' . $i++ . '.jpg';
				$image->fit($largeWidth, $largeHeight)
					->save($basepath.'large.'.$fileName, self::QUANLITY);
				$image->fit($mediumWidth, $mediumHeight)
					->save($basepath.'medium.'.$fileName, self::QUANLITY);
				$image->fit($smallWidth, $smallHeight)
					->save($basepath.'small.'.$fileName, self::QUANLITY);

				array_push($data['images'], $fileName);
			}
		}
	}

	protected function deleteImage($file)
	{
		$basepath = config('image.paths.house');

		\File::delete($basepath.'large.'.$file);
		\File::delete($basepath.'medium.'.$file);
		\File::delete($basepath.'small.'.$file);
	}

	/**
	 * Check Unique Url
	 *
	 * @param Request $request
	 * @return string Jquery Validation plugin only expect returns value string true or false
	 */
	public function unique(Request $request, $id = null)
	{
		if ($request->ajax()) {
			$title = $request->input('title');

			if (is_null($id)) {
				return (0 == House::where('title', $title)->count()) ? 'true' : 'false';
			} else {
				return (0 == House::where('title', $title)->where('id', '<>', $id)->count()) ? 'true' : 'false';
			}
		}
	}
}
