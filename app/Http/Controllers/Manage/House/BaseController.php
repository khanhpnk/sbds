<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\House;
use App\Project;
use Library\Image as Image;

class BaseController extends Controller
{
	protected function upload($file)
	{
		$i = 0;
		$fileName = date('His.dmY') . '.' . $i++ . '.jpg';
		$image = new Image();

		$image->setFile($file);
		$image->setPath(config('image.paths.project').'/'.Auth::user()->id);

		$image->fit(Image::LARGE)->upload(Image::LARGE."{$fileName}");
		$image->fit(Image::MEDIUM)->upload(Image::MEDIUM."{$fileName}");
		$image->fit(Image::SMALL)->upload(Image::SMALL."{$fileName}");

		return $fileName;
	}

	protected function delete($file)
	{
		$image = new Image();

		$image->setPath(config('image.paths.project').'/'.Auth::user()->id);

		$image->delete(Image::LARGE."{$file}");
		$image->delete(Image::MEDIUM."{$file}");
		$image->delete(Image::SMALL."{$file}");
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
