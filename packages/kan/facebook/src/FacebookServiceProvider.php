<?php namespace Kan\Facebook;

use Illuminate\Support\ServiceProvider;

class FacebookServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('Kan\Facebook\Facebook', function ($app) {
            $configs = $app['config']->get('kan-facebook.configs');
            
            if (! isset($config['persistent_data_handler'])) {
                $configs['persistent_data_handler'] = new LaravelPersistentDataHandler();
            }
            
            return new Facebook($configs);
        });
    }
}
