<?php

namespace Rukan\EasySocialite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rukan\EasySocialite\EasySocialiteManager
 */
class EasySocialite extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Rukan\EasySocialite\Contracts\Factory';
    }
}
