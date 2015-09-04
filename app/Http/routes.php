<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*********** *********** FRONTEND *********** ***********/
Route::get('/', 'HomeController@index');
Route::get('house', 'House\HouseController@index');
// Authentication with social
Route::get('social-login/{provider?}', 'Auth\AuthController@socialLogin');
/*********** *********** MANAGE *********** ***********/
Route::group(['prefix' => 'm', 'namespace' => 'Manage', 'middleware' => 'auth'], function()
{
    Route::group(['namespace' => 'House'], function()
    {
        Route::resource('house', 'HouseController', [
            'only' => ['index', 'create', 'store', 'edit', 'update'],
            'names' => [
                'create' => 'house.create',
                'store' => 'house.store',
                'edit' => 'house.edit',
                'update' => 'house.update',
            ]
        ]);
    });

    // Change profile
    Route::get('user/profile/{profile}',    ['uses' => 'ProfileController@getProfile',  'as' => 'profile.edit']);
    Route::put('user/profile',              ['uses' => 'ProfileController@putProfile',  'as' => 'profile.update']);
    // Change password
    Route::get('user/password',             ['uses' => 'UserController@getPassword',    'as' => 'password.edit']);
    Route::put('user/password',             ['uses' => 'UserController@putPassword',    'as' => 'password.update']);

    Route::resource('profile', 'ProfileController', [
        'only' => ['create', 'store'],
    ]);

    Route::get('message/f/{inbox}', ['uses' => 'MessageController@index', 'as' => 'message.index']);
    Route::delete('message/md', ['uses' => 'MessageController@mutilDestroy', 'as' => 'message.mutildestroy']);
    Route::resource('message', 'MessageController', [
        'only' => ['store', 'show'],
        'names' => [
            'store' => 'message.store',
            'show' => 'message.show'
        ]
    ]);
});