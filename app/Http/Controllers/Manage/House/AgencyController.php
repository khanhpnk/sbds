<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Requests\HouseRequest;
use Illuminate\Http\Request;
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
		$company = Auth::user()->company()->first();
		$house = null;
		return view('manage.house.agencies.create', compact('company', 'house'));
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
		$company = Auth::user()->company()->first();
		return view('manage.house.agencies.edit', compact('house', 'company'));
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

		$files = json_decode($data['files_deleted']);
		foreach ($files as $file) {
			if (($key = array_search($file, $data['images'])) !== false) {
				unset($data['images'][$key]);
				$this->deleteImage($file);
			}
		}

		$this->uploadImage($data);
		$house->fill($data)->save();

		return redirect('m/management')->with('flash_message', Lang::get('system.update'));
	}

	/**
	 * Check Unique Url
	 *
	 * @param Request $request
	 * @return string Jquery Validation plugin only expect returns value string true or false
	 */
	public function unique(Request $request, $id = null)
	{
		return $this->checkUniqueUrl($request, 'house', $id);
	}
}
