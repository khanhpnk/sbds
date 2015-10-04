@extends('manage.layout')

@section('content')
  <form accept-charset="UTF-8" action="{{ route('admin.article.store') }}" method="POST" role="form">
    @include('admin.articles._form', [
      'submitBtnText' => 'Tạo mới',
    ])
  </form>
@stop
