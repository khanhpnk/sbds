<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the password
     *
     * @param  Article  $article
     * @return Response
     */
    public function getProfile(Profile $profile)
    {
        return view('manage.profiles.profile', compact('profile'));
    }

    /**
     * Update the password in storage.
     *
     * @param  ProfileRequest $request
     * @return Response
     */
    public function putProfile(ProfileRequest $request)
    {
        if (! empty($_FILES['avatar']['name'])) {
            $image = \Image::make($_FILES['avatar']['tmp_name']);
            $fileName = uniqid('a_').'.jpg';
            $image->fit(180, 180)->save(public_path('images/uploads/avatars/'.$fileName), 100);

            Auth::user()->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'avatar'    => $fileName,
            ]);
        } else {
            Auth::user()->update($request->only('name', 'email'));
        }

        Auth::user()->profile()->update($request->only('phone', 'mobile', 'skype', 'facebook', 'website', 'address'));

        return redirect('m/user/profile/' . Auth::user()->profile->id)->with('flash_message', 'Thông tin cá nhân của bạn đã được cập nhật!');
    }
}
