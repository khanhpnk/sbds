<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Show the form for editing the password
     *
     * @return Response
     */
    public function edit()
    {
        return view('manage.users.password');
    }

    /**
     * Update the password in storage.
     *
     * @param  UserRequest $request
     * @return Response
     */
    public function update(UserRequest $request)
    {
        Auth::user()->update(['password' => bcrypt($request->input('password'))]);

        return redirect('m/user/password')->with('flash_message', 'Mật khẩu của bạn đã thay đổi thành công!');
    }
}
