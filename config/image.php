<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',


	'paths' => [
		'avatar' => 'upload/user',
        'company' => 'upload/company',
		'house' => 'house',
	],

	'sizes' => [
		'avatar' => ['w' => 180, 'h' => 180],
        'large' => ['w' => 675, 'h' => 402],
		'medium' => ['w' => 200, 'h' => 150],
		'small' => ['w' => 72, 'h' => 72]
	]

);
