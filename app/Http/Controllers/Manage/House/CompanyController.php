<?php

namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\JsonResponse;
use App\Company;
use Storage;

class CompanyController extends Controller
{
	const QUANLITY = 100;

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  CompanyRequest $request
	 * @return JsonResponse
	 */
	public function store(CompanyRequest $request)
	{
		$data = $request->only('title', 'short_description', 'description');

		if (!empty($_FILES['avatar']['tmp_name'])) {
			$data['avatar'] = $this->uploadImage($_FILES['avatar']['tmp_name']);
		}

		Auth::user()->company()->create($data);

		return redirect('m/agency/create')->with('flash_message', Lang::get('system.store'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  CompanyRequest  $request
	 * @return JsonResponse
	 */
	public function update(CompanyRequest $request)
	{
		$data = $request->only('title', 'short_description', 'description');

		if (!empty($_FILES['avatar']['tmp_name'])) {
			$data['avatar'] = $this->uploadImage($_FILES['avatar']['tmp_name']);

			$path = config('image.paths.company');
			\File::delete($path.DIRECTORY_SEPARATOR.Auth::user()->company->avatar);
		}

		Auth::user()->company->update($data);

		return redirect('m/agency/create')->with('flash_message', Lang::get('system.update'));
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
				return (0 == Company::where('title', $title)->count()) ? 'true' : 'false';
			} else {
				return (0 == Company::where('title', $title)->where('id', '<>', $id)->count()) ? 'true' : 'false';
			}
		}
	}

	/**
	 * @param array $data
	 */
	protected function uploadImage($tmpPath)
	{
		$avatar = config('image.sizes.medium');
		$userId = Auth::user()->id;
		$now = date('His.dmY');

		$image = \Image::make($tmpPath);
		$fileName = $userId.'.'.$now.'.jpg';
		$img = $image->fit($avatar['w'], $avatar['h'])->encode('jpg', self::QUANLITY);
		Storage::disk('s3')->put('company/'.$fileName, (string) $img);

		return $fileName;
	}
}
