@extends('manage.layout')

@section('meta_title'){{ 'Danh sách bài viết' }}@stop
@section('meta_description'){{ 'Danh sách bài viết' }}@stop

@section('content')
  <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Tạo bài viết mới</a>
  <hr>

  @if (count($articles) > 0)
    <p class="text-right">Trang {{ $articles->currentPage() }}/{{ $articles->lastPage() }} (Tổng {{ $articles->total() }})</p>

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
