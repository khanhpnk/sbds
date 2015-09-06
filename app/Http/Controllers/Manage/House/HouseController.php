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
        echo '<pre>';
        $houses = House::all();
        foreach ($houses as $house) {
            var_dump($house->images);
        }
        die;
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

        \Debugbar::info($data);

        Auth::user()->houses()->create($data);
        return view('manage.house.houses.create');
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
        \Debugbar::info($request->all());
        return view('manage.house.houses.edit', compact('house'));
    }
}
