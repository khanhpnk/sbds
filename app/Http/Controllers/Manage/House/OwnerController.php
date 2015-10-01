<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Requests\HouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\House;
use ImageHelper;

class OwnerController extends BaseController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $house = null;
        return view('manage.house.owner.create', compact('house'));
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

        return redirect('m/danh-sach-nha-dat/chinh-chu')->with('flash_message', Lang::get('system.store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  House  $house
     * @return Response
     */
    public function edit(House $house)
    {
        return view('manage.house.owner.edit', compact('house'));
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
        $path = config('image.paths.house').'/'.Auth::user()->id;
        $data = $request->all();
        $data['images'] = $house->images;

        $files = json_decode($data['files_deleted']);
        foreach ($files as $file) {
            if (($key = array_search($file, $data['images'])) !== false) {
                unset($data['images'][$key]);
                (new ImageHelper)->delete([
                    "{$path}/large{$file}",
                    "{$path}/medium{$file}",
                    "{$path}/small{$file}",
                ]);
            }
        }

        $this->uploadImage($data);
        $house->fill($data)->save();

        return redirect('m/danh-sach-nha-dat/chinh-chu')->with('flash_message', Lang::get('system.update'));
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
