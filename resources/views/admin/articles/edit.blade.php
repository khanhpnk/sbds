@extends('manage.layout')

@section('content')
  <form accept-charset="UTF-8" action="{{ route('admin.article.update', ['slug' => $article->slug]) }}" method="POST" role="form">
    <input type="hidden" name="_method" value="PUT">
    @include('admin.articles._form', [
      'submitBtnText' => 'Cập nhật',
    ])
  </form>
@stop
