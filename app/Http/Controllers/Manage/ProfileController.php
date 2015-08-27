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
        //Auth::user()->update($request->only('name', 'email'));
//        Auth::user()->profile()->updateOrCreate($request->except('name', 'email', '_token'));

//        $profile = new Profile();
//        $profile->updateOrCreate()
        return redirect('m/user/profile')->with('flash_message', 'Thông tin cá nhân của bạn đã được cập nhật!');
    }
}
