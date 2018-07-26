<?php

Route::get('thong-ke', 'ChartController@index');

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
Route::get('/search', 'HomeController@search');
Route::resource('test', 'TestController');

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
Route::resource('bai-viet', 'ArticleController', [
	'except' => 'show',
	'names' => [
		'create' => 'admin.article.create',
		'store' => 'admin.article.store',
		'update' => 'admin.article.update',
		'edit' => 'admin.article.edit',
		'destroy' => 'admin.article.destroy',
	]
]);
Route::group(['prefix' => 'quan-tri', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::get('banner', ['uses' => 'BannerController@edit', 'as' => 'admin.banner.edit']);
    Route::put('banner/update', ['uses' => 'BannerController@update', 'as' => 'admin.banner.update']);

    Route::get('up-bai/{type}', 'ManagementController@index');
    Route::put('up-bai/{type}/{id}/{is_approved?}', 'ManagementController@approved');


    Route::group(['namespace' => 'Service'], function() {
        Route::resource('cong-ty', 'CompanyController', [
            'except' => 'show', 'destroy', 'create', 'store',
            'names' => [
                'index' => 'admin.company.index',
                'update' => 'admin.company.update',
                'edit' => 'admin.company.edit',
            ]
        ]);

        Route::resource('thiet-ke-thi-cong', 'DesignController', [
            'except' => 'index', 'show',
            'names' => [
                'create' => 'admin.design.create',
                'store' => 'admin.design.store',
                'update' => 'admin.design.update',
                'edit' => 'admin.design.edit',
                'destroy' => 'admin.design.destroy',
            ]
        ]);
        Route::get('thiet-ke/{category?}/{sub_category?}', [
            'uses' => 'DesignController@index', 'as' => 'admin.design.index'
        ]);

        Route::get('thiet-ke-thi-cong/unique/{id?}', ['uses' => 'DesignController@unique', 'as' => 'design.unique']);
    });

});
/*********** *********** FRONT *********** ***********/
Route::group(['namespace' => 'Front'], function() {
    Route::get('bai-viet/{article}', ['uses' => 'ArticleController@show', 'as' => 'front.article.show']);
    Route::get('danh-sach-bai-viet/{filter}', ['uses' => 'ArticleController@index', 'as' => 'front.article.index']);

    /* Company */
    Route::get('cong-ty', ['uses' => 'CompanyController@index', 'as' => 'front.company.index']);
    Route::get('cong-ty-gioi-thieu/{company}', ['uses' => 'CompanyController@description', 'as' => 'front.company.description']);
    Route::get('cong-ty/{company}', ['uses' => 'CompanyController@show', 'as' => 'front.company.show']);

    // Design
    Route::get('thiet-ke-thi-cong', ['uses' => 'DesignController@index', 'as' => 'front.design.index']);
    Route::get('thiet-ke-thi-cong/{thiet_ke_thi_cong}', ['uses' => 'DesignController@show', 'as' => 'front.design.show']);
    Route::get('thiet-ke-cong-ty', ['uses' => 'DesignController@description', 'as' => 'front.design.description']);
    Route::get('thiet-ke/{category_uri}/{sub_category_uri}', ['uses' => 'DesignController@category', 'as' => 'front.design.category']);


    // map
    Route::post('map/search-markers', ['uses' => 'MapController@searchMarkers', 'as' => 'front.map.search']);
    Route::get('map/search-marker-for-detail', 'MapController@searchMarkerForDetail');
});

// Authentication with social
Route::get('social-login/{provider?}', 'Auth\AuthController@socialLogin');


Route::group(['namespace' => 'Front'], function() {
	Route::get('nha-dat-ban', 'HouseController@sell');
	Route::get('cho-thue', 'HouseController@rent');
	
    Route::get('tin-noi-bat', 'HouseController@featured');
    Route::get('tin-moi', 'HouseController@lastest');
    Route::get('danh-sach-nha-dat', 'HouseController@index');
    Route::get('nha-dat/{house}', 'HouseController@show');
    Route::get('ban-{category}', 'HouseController@sale');
    Route::get('cho-thue-{category}', 'HouseController@rentCat');

    Route::get('du-an-noi-bat', 'ProjectController@featured');
    Route::get('du-an/{project}', 'ProjectController@show');
    Route::get('du-an', 'ProjectController@index');
    Route::get('du-an-{category}', 'ProjectController@index');
});

Route::get('test', function () {

});


