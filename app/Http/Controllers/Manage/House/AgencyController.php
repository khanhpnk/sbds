<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Requests\HouseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\House;

class AgencyController extends BaseController
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('manage.house.agencies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  HouseRequest  $request
	 * @return Response
	 */
	public function store(HouseRequest $request)
	{
		$data = $request->all();
		$data['images'] = [];
		$this->uploadImage($data);
		Auth::user()->houses()->create($data);

		return redirect('m/management')->with('flash_message', Lang::get('system.store'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  House  $house
	 * @return Response
	 */
	public function edit(House $house)
	{
		return view('manage.house.agencies.edit', compact('house'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  HouseRequest  $request
	 * @param  House  $house
	 * @return Response
	 */
	public function update(HouseRequest $request, House $house)
	{
		$data = $request->all();
		$data['images'] = $house->images;
		$basepath = config('image.paths.house');

		$files = json_decode($data['files_deleted']);
		foreach ($files as $file) {
			if (($key = array_search($file, $data['images'])) !== false) {
				unset($data['images'][$key]);
				\File::delete($basepath.$file);
			}
		}

		$this->uploadImage($data);
		$house->fill($data)->save();

		return redirect('m/management')->with('flash_message', Lang::get('system.update'));
	}
}
