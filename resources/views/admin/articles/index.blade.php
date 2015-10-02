@extends('admin.app')

@section('content')
  <a href="{{url('admin/article/create')}}" class="btn btn-success">Tạo bài viết mới</a>
  <hr>
  @if (count($articles) > 0)
    <p class="text-right">Trang {{ $articles->currentPage() }}/{{ $articles->lastPage() }} (Tổng {{ $articles->total() }})</p>
    <div class="table-responsive">
	  <table class="table table-striped table-bordered table-hover">
	  <thead>
	    <tr class="bg-info">
          <th>Status</th>
	      <th>Title</th>
	      <th>Body</th>
	      <th>Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach ($articles as $article)
	    <tr>
          <td>{{ statusLabel($article->status) }}</td>
	      <td>{{ $article->title }}</td>
	      <td>{{ $article->body }}</td>
	      <td>
            <a href="{{ route('admin.article.edit', $article->slug) }}" class="btn btn-warning">Chỉnh sửa</a>
          </td>
          <td>
	        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.article.destroy', $article->slug]]) !!}
	          <button type="submit" class="btn btn-danger">Xóa</button>
	        {!! Form::close() !!}
	      </td>
		</tr>
	    @endforeach
	  </tbody>
	  </table>
    </div>
    
    <div class="text-center">{!! $articles->render() !!}</div>
  @else
    {{ config('blog.no_record') }}
  @endif
@stop
