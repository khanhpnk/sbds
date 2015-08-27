<?php

namespace Rukan\EasySocialite\Contracts;

interface Factory
{
    /**
     * Redirect the user to the Provider (GitHub, Facebook, etc..) authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider);

    /**
     * Process user information return from Provider (GitHub, Facebook, etc..).
     *
     * @return Response
     */
    public function handleProviderCallback($provider);
}
