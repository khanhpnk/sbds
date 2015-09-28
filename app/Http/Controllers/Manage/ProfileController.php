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

            $path = config('image.paths.avatar');
            \File::delete($path.DIRECTORY_SEPARATOR.Auth::user()->avatar);

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
     * @param array $data
     */
    protected function uploadImage($tmpPath)
    {
        $path = public_path(config('image.paths.avatar'));

        $avatar = config('image.sizes.avatar');
        $userId = Auth::user()->id;
        $now = date('His.dmY');

        $image = \Image::make($tmpPath);
        $fileName = $userId.'.'.$now.'.jpg';
        $image->fit($avatar['w'], $avatar['h'])
            ->save($path.DIRECTORY_SEPARATOR.$fileName, self::QUANLITY);

        return $fileName;
    }
}
