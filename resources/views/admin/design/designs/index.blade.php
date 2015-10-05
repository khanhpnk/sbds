@extends('manage.layout')

@section('meta_title'){{ 'Danh sách thiết kế thi công' }}@stop
@section('meta_description'){{ 'Danh sách thiết kế thi công' }}@stop

@section('content')
  <a href="{{ route('admin.design.create') }}" class="btn btn-primary">Tạo thiết kế thi công mới</a>
  <hr>

  @if (count($designs) > 0)
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
        @foreach ($designs as $design)
        <tr>
          <td>{{ $design->title }}</td>
          <td><a href="{{ route('admin.design.edit', $design->slug) }}" class="btn btn-info">Chỉnh sửa</a></td>
      </tr>
        @endforeach
      </tbody>
      </table>
    </div>
    
    <div class="text-center">{!! $articles->render() !!}</div>
  @else
    Chưa có thiết kế thi công nào!
  @endif
@stop
