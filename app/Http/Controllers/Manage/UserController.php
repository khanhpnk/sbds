<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the form for editing the password
     *
     * @return Response
     */
    public function getPassword()
    {
        return view('manage.users.password');
    }

    /**
     * Update the password in storage.
     *
     * @param  UserRequest $request
     * @param  User $user
     * @return Response
     */
    public function postPassword(UserRequest $request)
    {
        $password = $request->input('password');
        Auth::user()->update(['password' => bcrypt($password)]);

        return redirect('m/user/password')->with('flash_message', 'Mật khẩu của bạn đã thay đổi thành công!');
    }
}
