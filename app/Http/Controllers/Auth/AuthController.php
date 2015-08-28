<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EasySocialite;

class AuthController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Social login along the Provider (GitHub, Facebook, etc..)
     *
     * @return Response
     */
    public function socialLogin(Request $request, $provider = null)
    {
        if ($request->all()) {
            return EasySocialite::handleProviderCallback($provider);
        }

        return EasySocialite::redirectToProvider($provider);
    }
}
