<?php
namespace App\Http\Controllers\Manage\House;

use App\Http\Requests\HouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\House;

class OwnerController extends BaseController
{
    public function __construct()
    {
        if (isset(Auth::user()->id)) {
            $this->path = config('image.paths.house') . '/' . Auth::user()->id;
        }
    }

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
		$i = 0;
		
        foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
            if (!empty($tmpPath)) {
                $fileUpload = $this->upload($tmpPath, $i++);
                array_push($data['images'], $fileUpload);
            }
        }
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
        $data = $request->all();
        $data['images'] = $house->images ? $house->images : [];
        $i = 0;

        $files = json_decode($data['files_deleted']);
        foreach ($files as $file) {
            if (($key = array_search($file, $data['images'])) !== false) {
                unset($data['images'][$key]);
                $this->delete($file);
            }
        }

        foreach ($_FILES['images']['tmp_name'] as $tmpPath) {
            if (!empty($tmpPath)) {
                $fileUpload = $this->upload($tmpPath, $i++);
                array_push($data['images'], $fileUpload);
            }
        }

        // Hàm unset() khiến key của array ko còn là dãy số liên tiếp
        // Lúc này Laravel sẽ ko đối xử và lưu 'images' như kiểu array mà là kiểu Json, cần sửa chữa vấn đề này
        $data['images'] = array_values($data['images']);

        $house->fill($data)->save();

        return redirect('m/danh-sach-nha-dat/chinh-chu')->with('flash_message', Lang::get('system.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(House $house)
    {
        foreach ($house->images as $image) {
            $this->delete($image);
        }
        $house->delete();

        return redirect('m/danh-sach-nha-dat/chinh-chu')->with('flash_message', Lang::get('system.destroy'));
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
