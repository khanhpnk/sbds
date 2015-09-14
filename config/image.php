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
		'avatar' => 'images/uploads/avatar/',
		'house' => public_path('images/uploads/house/'),
        'project' => public_path('images/uploads/project/'),
	],

	'sizes' => [
		'avatar' => ['w' => 180, 'h' => 180],
		'medium' => ['w' => 246, 'h' => 160],
		'small' => ['w' => 80, 'h' => 52]
	]

);
