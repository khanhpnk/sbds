@extends('manage.layout')

@section('meta_title'){{ 'Danh sách bài viết' }}@stop
@section('meta_description'){{ 'Danh sách bài viết' }}@stop

@section('content')
  @include('admin.articles._nav')

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
            <td>{{ str_limit($article->title, 56) }}</td>
            <td>
              <a href="{{ route('front.article.show', $article->slug) }}" target="_blank" class="btn btn-primary">Chi tiết</a>
              <a href="{{ route('admin.article.edit', $article->slug) }}" class="btn btn-primary">Chỉnh sửa</a>
              <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('admin.article.destroy',  $article->slug) }}" class="form-delete" method="POST" role="form">
                <input type="hidden" name="_method" value="DELETE">
                {!! csrf_field() !!}
                <button class="btn btn-delete btn-primary" type="submit" role="button">Xóa</button>
              </form>
            </td>
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
