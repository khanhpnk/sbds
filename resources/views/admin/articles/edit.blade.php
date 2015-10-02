@extends('admin.app')

@section('content')
	<h1>Chỉnh sửa bài viết: {{ $article->title }}</h1>

	{!! Form::model($article, ['method' => 'PATCH', 'action' => ['Admin\ArticleController@update', $article->slug], 'role' => 'form', 'files' => true]) !!}
		@include ('admin.articles._form', ['submitButtonText' => 'Cập nhật'])
	{!! Form::close() !!}
@stop
