<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

	'required'			=> ':attribute cần được nhập.',
	'email'        	=> ':attribute không hợp lệ.',
	'unique'			=> ':attribute đã tồn tại trong hệ thống.',
	'confirmed'		=> ':attribute xác nhận không khớp.',
	'max'                  => [
		'string'  => ':attribute không vượt quá :max ký tự.',
	],
	'min'                  => [
		'string'  => ':attribute phải từ :min ký tự trở lên.',
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/
	'attributes' => [
		'email' => 'Địa chỉ email',
		'password' => 'Mật khẩu',
	],

];
