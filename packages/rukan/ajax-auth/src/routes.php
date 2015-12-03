<?php
Route::get('verified/template', function () {
	$email = 'a@a.com';
	$code = '23452345234j52345io2j3io4523i45';
	
	return view('emails.verified', compact('email', 'code'));
});
Route::get('verified/code/{code}', 'Rukan\AjaxAuth\AjaxAuthController@getVerified');
Route::controllers([
    'ajax-auth' => 'Rukan\AjaxAuth\AjaxAuthController',
    'password' => 'Rukan\AjaxAuth\PasswordController',
]);