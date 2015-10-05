@extends('manage.layout')

@section('meta_title'){{ 'Tạo bài viết mới' }}@stop
@section('meta_description'){{ 'Tạo bài viết mới' }}@stop

@section('content')
  <form accept-charset="UTF-8" action="{{ route('admin.article.store') }}" method="POST" role="form">
    @include('admin.articles._form', [
      'submitBtnText' => 'Tạo mới',
    ])
  </form>
@stop
