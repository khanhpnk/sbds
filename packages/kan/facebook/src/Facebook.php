<?php namespace Kan\Facebook;

use Facebook\Facebook as FacebookBase;

class Facebook extends FacebookBase
{

    public function __construct(array $configs)
    {
        parent::__construct($configs);
    }
}
