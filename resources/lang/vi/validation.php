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

	'required'			=> 'Bạn chưa nhập :attribute.',
	'email'        	=> 'Địa chỉ :attribute không hợp lệ.',
	'unique'			=> ':attribute đã tồn tại trong hệ thống.',
	'confirmed'		=> ':attribute xác nhận không khớp.',

    'custom' => [
        'name' => [
            'required' 	=> 'Bạn chưa nhập tên',
        	'between'	=> 'Tên phải từ :min đến :max ký tự',
        	'unique' 	=> 'Tên bạn nhập đã tồn tại. Hãy nhập một tên khác',
        ],
    	'title' => [
    		'required' 	=> 'Bạn chưa nhập tiêu đề bài viết',
    		'between'	=> 'Tiêu đề phải chứ từ :min đến :max ký tự',
    		'unique' 	=> 'Tiêu đề bạn nhập đã tồn tại. Hãy nhập một tên khác',
    	],
    	'content' => [
    		'required' 	=> 'Bạn chưa nhập nội dung bài viết',
    	],
    	'category_id' => [
    		'required' 	=> 'Bạn cần chọn một danh mục cho bài viết.',
    	],
    	'published_at' => [
    		'required' 	=> 'Bạn cần chọn một ngày xuất bản cho bài viết.',
    	],
    		
    ],

];
