<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use App\Banner;
use Library\Image;

class BannerController extends BaseController
{

    /**
     * Show the form for editing the resource.
     *
     * @return Response
     */
    public function edit()
    {
        $banner = Banner::find(1);

        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $banner = Banner::find(1);

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = date('His.dmY') . '.' . $extension;

            // Upload new image
            $image = new Image();
            $image->setFile($request->file('image')->getRealPath());
            $image->setPath('banner');
            $image->upload($fileName);

            // Delete old image
            $image->delete($banner->image);

            // Save image in storage
            $banner->image = $fileName;
            $banner->save();
        }

        return Redirect::back()->with('flash_message', Lang::get('system.update'));
    }
}
