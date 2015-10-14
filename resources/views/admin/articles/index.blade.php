@extends('manage.layout')

@section('meta_title'){{ 'Danh sách bài viết' }}@stop
@section('meta_description'){{ 'Danh sách bài viết' }}@stop

@section('content')
  <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Tạo bài viết mới</a>
  <hr>

  <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
    <a role="button" class="btn btn-primary" href="{{ route('admin.article.index', 'id=1') }}">Về chúng tôi</a>
    <a role="button" class="btn btn-primary" href="{{ route('admin.article.index', 'id=2') }}">Tuyển dụng</a>
    <a role="button" class="btn btn-primary" href="{{ route('admin.article.index', 'id=3') }}">Nội quy</a>
    <a role="button" class="btn btn-primary" href="{{ route('admin.article.index', 'id=4') }}">Hướng dẫn</a>
    <a role="button" class="btn btn-primary" href="{{ route('admin.article.index', 'id=5') }}">Báo giá</a>
  </div>
  <hr>

  @if (count($articles) > 0)
    <p class="text-right">Trang {{ $articles->currentPage() }}/{{ $articles->lastPage() }} (Tổng {{ $articles->total() }})</p>
    <hr>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr class="bg-info">
          <th>Tiêu đề</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($articles as $article)
          <tr>
            <td>{{ $article->title }}</td>
            <td><a href="{{ route('admin.article.edit', $article->slug) }}" class="btn btn-info">Chỉnh sửa</a></td>
          </tr>
        @endforeach
      </tbody>
      </table>
    </div>
    
    <div class="text-center">{!! $articles->render() !!}</div>
  @else
    Chưa có bài viết nào!
  @endif
@stop
