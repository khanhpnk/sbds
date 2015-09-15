<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ProfileController extends Controller
{
    const QUANLITY = 100;

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

        $profile = Auth::user()->profile()->first();
        $profile->fill($data)->save();

        if (! empty($_FILES['avatar']['tmp_name'])) {
            $fileName = $this->uploadImage($_FILES['avatar']['tmp_name']);

            $basepath = config('image.paths.avatar');
            \File::delete($basepath.Auth::user()->avatar);

            Auth::user()->update([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'avatar'    => $fileName
            ]);
        } else {
            Auth::user()->update([
                'name'      => $data['name'],
                'email'     => $data['email']
            ]);
        }

        return redirect('m/user/profile/')->with('flash_message', Lang::get('system.update'));
    }

    /**
     * Note: Passing by Reference
     * @param array $data
     */
    protected function uploadImage($tmpPath)
    {
        $width = config('image.sizes.avatar.w');
        $height = config('image.sizes.avatar.h');
        $basepath = public_path(config('image.paths.avatar'));
        $userId = Auth::user()->id;
        $now = date('His.dmY');

        $image = \Image::make($tmpPath);
        $fileName = $userId . '.' . $now . '.jpg';
        $image->fit($width, $height)
            ->save($basepath.$fileName, self::QUANLITY);

        return $fileName;
    }
}
