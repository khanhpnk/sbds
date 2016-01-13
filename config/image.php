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
		'user' => 'user',
        'company' => 'company',
		'house' => 'house',
        'project' => 'project',
        'design' => 'design',
		'banner' => 'banner',
	],

	'sizes' => [
		'avatar' => ['w' => 180, 'h' => 180],
        'large' => ['w' => 675, 'h' => 402],
		'medium' => ['w' => 208, 'h' => 156],
		'small' => ['w' => 72, 'h' => 72],
		'banner' => ['w' => 1350, 'h' => 400]
	]

);
