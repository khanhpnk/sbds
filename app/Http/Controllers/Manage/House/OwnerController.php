<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\House;

class OwnerController extends Controller
{
    const QUANLITY = 100;

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
        $data = $request->all();
        $data['images'] = $house->images;
        $basepath = config('image.paths.house');

        $files = json_decode($data['files_deleted']);
        foreach ($files as $file) {
            if (($key = array_search($file, $data['images'])) !== false) {
                unset($data['images'][$key]);
                \File::delete($basepath.$file);
                \File::delete($basepath.'thumb-'.$file);
            }
        }

        $this->uploadImage($data);
        $house->fill($data)->save();

        return redirect('m/management')->with('flash_message', Lang::get('system.update'));
    }

    /**
     * Note: Passing by Reference
     * @param array $data
     */
    protected function uploadImage(&$data)
    {
        $largeWidth = config('image.sizes.large.w');
        $largeHeight = config('image.sizes.large.h');
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
                    ->save($basepath.$fileName, self::QUANLITY);
                $image->fit($smallWidth, $smallHeight)
                    ->save($basepath.'thumb-'.$fileName, self::QUANLITY);

                array_push($data['images'], $fileName);
            }
        }
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
                return (0 == House::isOwner(1)->where('title', $title)->count()) ? 'true' : 'false';
            } else {
                return (0 == House::isOwner(1)->where('title', $title)->where('id', '<>', $id)->count()) ? 'true' : 'false';
            }
        }
    }
}
