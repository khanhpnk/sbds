<?php

namespace Rukan\EasySocialite;

use Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class EasySocialiteManager implements Contracts\Factory
{
    /**
     * Redirect the user to the Provider (GitHub, Facebook, etc..) authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Process user information return from Provider (GitHub, Facebook, etc..).
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $socialUser = $this->getSocialUser($provider);
        $userModel = $this->createUser($socialUser);
        Auth::login($userModel);

        return redirect('/');
    }

    public function getSocialUser($provider)
    {
        // Obtain the user information
        $user = Socialite::driver($provider)->user();

        // Retrieve all values useful
        return $socialUser = [
            'provider' => $provider,
            'provider_id' => $user->getId(),
            'email_provider' => $user->getEmail(),
            'name' => $user->getName() ? $user->getName() : $user->getNickname(),
            'avatar' => $user->getAvatar(),
        ];
    }

    /**
     * Return user if exists; create and return if doesn't
     * Update new data if need
     *
     * @param $userObtain
     * @return static
     */
    public function createUser($socialUser)
    {
        $userModel = User::where('provider', $socialUser['provider'])
            ->where('provider_id', $socialUser['provider_id'])
            ->first();

        if (! $userModel) {
            $userModel = User::create($socialUser);
        } else {
            // Maybe User needs updating new data?
            if (! empty($diff = array_diff($socialUser, $userModel->toArray()))) {
                $userModel->update($diff);
            }
        }

        return $userModel;
    }
}
