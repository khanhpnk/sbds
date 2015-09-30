<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use ImageHelper;

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

        $fileName = (new ImageHelper)->upload('user', $_FILES['avatar']['tmp_name']);

        $profile = Auth::user()->profile()->first();
        $profile->fill($data)->save();
        Auth::user()->update([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'avatar'    => $fileName
        ]);

        return redirect('m/user/profile/')->with('flash_message', Lang::get('system.update'));
    }
}
