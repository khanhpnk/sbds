<?php

namespace App\Http\Controllers\Manage\House;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $houses = House::orderBy('id', 'desc')->paginate(10);

        return view('manage.house.houses.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('manage.house.houses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HouseRequest  $request
     * @return Response
     */
    public function store(HouseRequest $request)
    {
        $i = 0;
        $data = $request->all();

        foreach ($_FILES['images']['tmp_name'] as $tmpName) {
            if (!empty($tmpName)) {
                $image = \Image::make($tmpName);

                $fileName = Auth::user()->id . '.' . date('His.dmY') . ".$i.jpg";
                $image->fit(config('image.sizes.medium.w'), config('image.sizes.medium.h'))
                    ->save(public_path(config('image.paths.house').$fileName), 100);

                $data['images'][$i++] = $fileName;
            }
        }

        Auth::user()->houses()->create($data);

        return redirect('m/house')->with('flash_message', 'da tao moi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  House  $house
     * @return Response
     */
    public function edit(House $house)
    {
        return view('manage.house.houses.edit', compact('house'));
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

        $data['feature'] = isset($data['feature']) ? $data['feature'] : null;
        unset($data['images']);

        $house->fill($data)->save();

        return redirect('m/house')->with('flash_message', 'da cap nhat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  House  $house
     * @return Response
     */
    public function destroy(House $house)
    {
        $house->delete();
        return redirect('m/house')->with('flash_message', 'da xoa');
    }
}
