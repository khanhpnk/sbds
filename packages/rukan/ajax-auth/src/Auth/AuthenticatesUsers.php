<?php

namespace Rukan\AjaxAuth\Auth;

use Rukan\AjaxAuth\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\JsonResponse;

trait AuthenticatesUsers
{
    /**
     * Login success redirect
     *
     * @var string
     */
    protected $redirectAfterLogin = '/';

    /**
     * Logout success redirect
     *
     * @var string
     */
    protected $redirectAfterLogout = '/';

    /**
     * Login fail redirect to the path login form
     *
     * @var string
     */
    protected $loginPath = '/';

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Rukan\AjaxAuth\Requests\UserLoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(UserLoginRequest $request)
    {
        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $request->ajax() ? new JsonResponse([
                'redirect' => $this->redirectAfterLogin
            ], 200) : redirect()->intended($this->redirectAfterLogin);
        }

        $error = ['message' => Lang::get('auth.failed')];
        return $request->ajax() ? new JsonResponse($error, 403) : redirect($this->loginPath)
            ->withInput($request->only('email', 'remember'))
            ->withErrors($error);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect($this->redirectAfterLogout);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Rukan\AjaxAuth\Requests\UserLoginRequest $request
     * @return array
     */
    protected function getCredentials(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['verified'] = 1;
        
        return $credentials;
    }
}
