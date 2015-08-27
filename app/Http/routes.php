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
// Authentication with social
Route::get('social-login/{provider?}', 'Auth\AuthController@socialLogin');
/*********** *********** MANAGE *********** ***********/
Route::group(['prefix' => 'm', 'namespace' => 'Manage', 'middleware' => 'auth'], function()
{
    // Change password
    Route::get('user/password', ['uses' => 'UserController@getPassword', 'as' => 'user.password.edit']);
    Route::post('user/password', ['uses' => 'UserController@postPassword', 'as' => 'user.password.update']);

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