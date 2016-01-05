<?php

namespace Rukan\AjaxAuth\Auth;

use Illuminate\Support\Facades\DB;
use Rukan\AjaxAuth\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\User;
use Mail;
use App\Http\Requests\Request;

trait RegistersUsers
{
    /**
     * Register success redirect
     *
     * @var string
     */
    protected $redirectAfterRegister = 'm/user/profile';

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
        $this->create($request->all());
        $this->sendEmailVerified($request);

        return new JsonResponse([
            'message' => 'Cảm ơn bạn đã đăng ký sử dụng dịch vụ. Bạn cần truy cập email để hoàn thành việc đăng ký'
        ], 201);
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
            	'code' => md5($data['email']),
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $userModel->profile()->create([]);

            return $userModel;
        });
    }
    
    public function getVerified($code)
    {
    	$user = User::where('code', $code)->first();
    	if ($user) {
    		$user->update(['verified' => 1]);
    		Auth::loginUsingId($user->id);
    	}
    	
    	return redirect($this->redirectAfterRegister);
    }
    
    public function sendEmailVerified(UserRegisterRequest $request)
    {    
    	$email = $request->get('email');
    	
    	Mail::send('emails.verified', ['email' => $email, 'code' => md5($email)], function ($m) use ($email) {
    		$m->from('house360.vn@gmail.com', 'Quản trị viên');
    		$m->to($email)->subject('Thông báo tạo tài khoản thành công trên house360.vn!');
    	});
    }
}
