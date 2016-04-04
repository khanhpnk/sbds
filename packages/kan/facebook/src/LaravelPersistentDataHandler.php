<?php namespace Kan\Facebook;

use Facebook\PersistentData\PersistentDataInterface;

class LaravelPersistentDataHandler implements PersistentDataInterface
{
  /**
   * @var string Prefix to use for session variables.
   */
  protected $sessionPrefix = 'FBRLH_';

  /**
   * @inheritdoc
   */
  public function get($key)
  {
    return \Session::get($this->sessionPrefix . $key);
  }

  /**
   * @inheritdoc
   */
  public function set($key, $value)
  {
    \Session::put($this->sessionPrefix . $key, $value);
  }
}
