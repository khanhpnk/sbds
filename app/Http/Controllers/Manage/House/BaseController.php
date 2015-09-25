<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\House;
use App\Project;
use Storage;

class BaseController extends Controller
{
	const QUANLITY = 100;

	protected $path = '';
	protected $directory = '';

	public function __construct()
	{
		// prevent error: "[ErrorException] Trying to get property of non-object" in console
		if (isset(Auth::user()->id)) {
			$this->directory = config('image.paths.house') . DIRECTORY_SEPARATOR . Auth::user()->id . DIRECTORY_SEPARATOR;
			$this->path = public_path('upload' . DIRECTORY_SEPARATOR . $this->directory);
			//dd($this->path, $this->directory);
		}
	}

	/**
	 * Note: Passing by Reference
	 * @param array $data
	 */
	protected function uploadImage(&$data)
	{
		$large = config('image.sizes.large');
		$medium = config('image.sizes.medium');
		$small = config('image.sizes.small');
		$now = date('His.dmY');
		$i = 0;

		if (!Storage::exists($this->directory)) {
			Storage::makeDirectory($this->directory);
		}

		foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
			if (!empty($tmpPath)) {
				$image = \Image::make($tmpPath);
				$fileName = $now . '.' . $i++ . '.jpg';

				$image->fit($large['w'], $large['h'])
					->save($this->path.'large'.$fileName, self::QUANLITY);
				$image->fit($medium['w'], $medium['h'])
					->save($this->path.'medium'.$fileName, self::QUANLITY);
				$image->fit($small['w'], $small['h'])
					->save($this->path.'small'.$fileName, self::QUANLITY);

				array_push($data['images'], $fileName);
			}
		}
	}

	protected function deleteImage($file)
	{
		Storage::delete([
			$this->directory.'large'.$file,
			$this->directory.'medium'.$file,
			$this->directory.'small'.$file
		]);
	}

	/**
	 * Check Unique Url
	 *
	 * @param Request $request
	 * @return string Jquery Validation plugin only expect returns value string true or false
	 */
	public function checkUniqueUrl(Request $request, $type, $id = null)
	{
		if ($request->ajax()) {
			$title = $request->input('title');

			if (is_null($id)) {
				if ('house' == $type) {
					return (0 == House::where('title', $title)->count()) ? 'true' : 'false';
				} elseif ('project' == $type) {
					return (0 == Project::where('title', $title)->count()) ? 'true' : 'false';
				}
			} else {
				if ('house' == $type) {
					return (0 == House::where('title', $title)->where('id', '<>', $id)->count()) ? 'true' : 'false';
				} elseif ('project' == $type) {
					return (0 == Project::where('title', $title)->where('id', '<>', $id)->count()) ? 'true' : 'false';
				}
			}
		}
	}
}
