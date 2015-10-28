<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Library\Image;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the password
     *
     * @return Response
     */
    public function edit()
    {
        $profile = Auth::user()->profile()->first();
        return view('manage.profiles.profile', compact('profile'));
    }

    /**
     * Update the password in storage.
     *
     * @param  ProfileRequest $request
     * @return Response
     */
    public function update(ProfileRequest $request)
    {
        $data = $request->all();

        if (!empty($_FILES['avatar']['tmp_name'])) {
            $path = config('image.paths.user') . '/' . Auth::user()->id;
            $fileName = date('His.dmY') . '.jpg';
            $image = new Image();

            $image->setFile($_FILES['avatar']['tmp_name']);
            $image->setPath($path);
            $image->fit(Image::AVATAR)->upload($fileName);

            if (!empty(Auth::user()->avatar)) {
                $image->delete(Auth::user()->avatar);
            }

            Auth::user()->update([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'avatar'    => $fileName
            ]);
        } else {
            Auth::user()->update([
                'name'      => $data['name'],
                'email'     => $data['email'],
            ]);
        }


        $profile = Auth::user()->profile()->first();
        $profile->fill($data)->save();

        return redirect('m/user/profile/')->with('flash_message', Lang::get('system.update'));
    }
}
