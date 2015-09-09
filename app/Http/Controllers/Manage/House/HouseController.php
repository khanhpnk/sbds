<?php

namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\House;

class HouseController extends Controller
{
    protected $width = '';
    protected $height = '';
    protected $basepath = '';
    const QUANLITY = 100;

    public function __construct() {
        $this->width = config('image.sizes.medium.w');
        $this->height = config('image.sizes.medium.h');
        $this->basepath = config('image.paths.house');
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
        $data['images'] = '';
        foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
            if (!empty($tmpPath)) {
                var_dump($tmpPath);
                $image = \Image::make($tmpPath);

                $fileName = Auth::user()->id . '.' . date('His.dmY') . ".$i.jpg";
                $image->fit($this->width, $this->height)
                      ->save($this->basepath.$fileName, self::QUANLITY);

                $data['images'][$i++] = $fileName;
            }
        }
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
        dd($request->all());
        $data = $request->all();

        $data['feature'] = isset($data['feature']) ? $data['feature'] : null;
        unset($data['images']);

        $house->fill($data)->save();

        return redirect('m/house')->with('flash_message', 'da cap nhat');
    }
}
