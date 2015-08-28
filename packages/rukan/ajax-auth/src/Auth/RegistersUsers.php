<?php

namespace Rukan\AjaxAuth\Auth;

use Illuminate\Support\Facades\DB;
use Rukan\AjaxAuth\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\User;

trait RegistersUsers
{
    /**
     * Register success redirect
     *
     * @var string
     */
    protected $redirectAfterRegister = '/m/profile/create';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Rukan\AjaxAuth\Requests\UserRegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(UserRegisterRequest $request)
    {
        Auth::login($this->create($request->all()));

        return $request->ajax() ? new JsonResponse([
            'redirect' => $this->redirectAfterRegister
        ], 201) : redirect($this->redirectAfterRegister);
    }

    /**
     * Create a new user instance after a valid registration.
     * And now, include profiles
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $userModel = User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $userModel->profile()->create([]);

            return $userModel;
        });
    }
}
