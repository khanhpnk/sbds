@extends('manage.layout')

@section('meta_title'){{ 'Cập nhật bài viết' }}@stop
@section('meta_description'){{ 'Cập nhật bài viết' }}@stop

@section('content')

  <div class="message-toolbar">
    <a role="button" href="{{ route('admin.article.create', 'id=1') }}" class="btn btn-primary">Giới thiệu về house</a>
    <a role="button" href="{{ route('admin.article.create', 'id=2') }}" class="btn btn-primary">Tuyển dụng</a>
    <a role="button" href="{{ route('admin.article.create', 'id=3') }}" class="btn btn-primary">Nội quy đăng tin</a>
    <a role="button" href="{{ route('admin.article.create', 'id=4') }}" class="btn btn-primary">Hướng dẫn sử dụng</a>
    <a role="button" href="{{ route('admin.article.create', 'id=5') }}" class="btn btn-primary">Báo giá</a>
    <a role="button" href="{{ route('admin.article.create', 'id=6') }}" class="btn btn-primary">Hướng dẫn thanh toán</a>
  </div>

  <form accept-charset="UTF-8" action="{{ route('admin.article.update', ['slug' => $article->slug]) }}" method="POST" role="form" id="articleForm">
    <input type="hidden" name="_method" value="PUT">
    @include('articles._form', ['submitBtnText' => 'Cập nhật'])
  </form>
  @include('articles._list')
@stop
