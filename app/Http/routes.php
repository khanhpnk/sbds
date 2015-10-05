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
Route::resource('test', 'TestController');

/* Project */
Route::get('du-an/{project}', ['uses' => 'ProjectController@show', 'as' => 'project.show']);
Route::get('du-an/{city?}/{cityId?}/{district?}/{districtId?}/{ward?}/{wardId?}', [
    'uses' => 'ProjectController@index', 'as' => 'project.index'
]);

/* House */
Route::get('nha-dat/{house}', ['uses' => 'HouseController@show', 'as' => 'house.show']);
Route::get('danh-sach-nha-dat/{type}/{city?}/{cityId?}/{district?}/{districtId?}/{ward?}/{wardId?}', [
    'uses' => 'HouseController@index', 'as' => 'house.index'
]);

/* Company */
Route::get('cong-ty', ['uses' => 'CompanyController@index', 'as' => 'company.index']);
Route::get('cong-ty/{company}', ['uses' => 'CompanyController@show', 'as' => 'company.show']);
//Route::get('cong-ty/{company}/{filter}', ['uses' => 'CompanyController@houseList', 'as' => 'company.houseList']);

//// Authentication with social
//Route::get('social-login/{provider?}', 'Auth\AuthController@socialLogin');
/*********** *********** MANAGE *********** ***********/
Route::group(['prefix' => 'm', 'namespace' => 'Manage', 'middleware' => 'auth'], function() {
    // House Catalog Management
    Route::group(['namespace' => 'House'], function() {
        Route::get('owner/unique/{id?}', ['uses' => 'OwnerController@unique', 'as' => 'owner.unique']);
        Route::resource('owner', 'OwnerController');

        Route::get('agency/unique/{id?}', ['uses' => 'AgencyController@unique', 'as' => 'agency.unique']);
        Route::resource('agency', 'AgencyController');

        Route::get('company/unique/{id?}', ['uses' => 'CompanyController@unique', 'as' => 'company.unique']);
        Route::post('company/save', ['uses' => 'CompanyController@store', 'as' => 'company.save']);
        Route::put('company/save', ['uses' => 'CompanyController@update', 'as' => 'company.save']);

        Route::get('project/unique/{id?}', ['uses' => 'ProjectController@unique', 'as' => 'project.unique']);
        Route::resource('project', 'ProjectController');

        Route::get('danh-sach-nha-dat/{filter?}', [
            'uses' => 'ManagementController@index', 'as' => 'manage.house.index'
        ]);
    });
    // Change password
    Route::get('user/password', ['uses' => 'UserController@edit', 'as' => 'password.edit']);
    Route::put('user/password', ['uses' => 'UserController@update', 'as' => 'password.update']);
    // Change profile
    Route::get('user/profile',    ['uses' => 'ProfileController@edit',  'as' => 'profile.edit']);
    Route::put('user/profile',    ['uses' => 'ProfileController@update',  'as' => 'profile.update']);
    // Message Management
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

/*********** *********** ADMIN *********** ***********/
Route::group(['prefix' => 'quan-tri', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::resource('bai-viet', 'ArticleController', [
        'except' => 'show', 'destroy',
        'names' => [
            'index' => 'admin.article.index',
            'create' => 'admin.article.create',
            'store' => 'admin.article.store',
            'update' => 'admin.article.update',
            'edit' => 'admin.article.edit',
        ]
    ]);
    Route::group(['namespace' => 'Design'], function() {
        Route::resource('cong-ty', 'CompanyController', [
            'except' => 'show', 'destroy', 'create', 'store',
            'names' => [
                'index' => 'admin.company.index',
                'update' => 'admin.company.update',
                'edit' => 'admin.company.edit',
            ]
        ]);
        Route::resource('thiet-ke-thi-cong', 'DesignController', [
            'except' => 'show', 'destroy',
            'names' => [
                'index' => 'admin.design.index',
                'create' => 'admin.design.create',
                'store' => 'admin.design.store',
                'update' => 'admin.design.update',
                'edit' => 'admin.design.edit',
            ]
        ]);
    });

});
/*********** *********** FRONT *********** ***********/
Route::group(['namespace' => 'Front'], function() {
    Route::get('bai-viet/{bai_viet}', ['uses' => 'ArticleController@show', 'as' => 'front.article.show']);
});