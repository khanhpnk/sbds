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
     * @param  Request  $request
     * @return Response
     */
    public function store(HouseRequest $request)
    {
//        array:5 [
//        "name" => array:1 [
//        0 => ""
//    ]
//  "type" => array:1 [
//        0 => ""
//    ]
//  "tmp_name" => array:1 [
//        0 => ""
//    ]
//  "error" => array:1 [
//        0 => 4
//    ]
//  "size" => array:1 [
//        0 => 0
//    ]
//]
        \Debugbar::info($_FILES['images']);
        foreach ($_FILES['images'] as $file) {
            \Debugbar::info($file);
        }


//        if (! empty($_FILES['images']['name'])) {
//            $image = \Image::make($_FILES['avatar']['tmp_name']);
//
//            $fileName = md5(config('app.key').Auth::user()->id).'.jpg';
//            $image->fit(config('image.sizes.avatar.w'), config('image.sizes.avatar.h'))
//                ->save(public_path(config('image.paths.avatar').$fileName), 100);
//
//            Auth::user()->update([
//                'name'      => $request->input('name'),
//                'email'     => $request->input('email'),
//                'avatar'    => $fileName,
//            ]);
//        } else {
//            Auth::user()->update($request->only('name', 'email'));
//        }


//        \Debugbar::info($request->all());
//        \Debugbar::info($request->file('images'));
//        foreach ($request->file('images') as $aa) {
//            \Debugbar::info($aa->getRealPath());
//        }



//        \Debugbar::info($temp);

//        Auth::user()->houses()->create($request->all());
        return view('manage.house.houses.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
