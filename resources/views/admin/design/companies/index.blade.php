@extends('manage.layout')

@section('meta_title'){{ 'Danh sách công ty' }}@stop
@section('meta_description'){{ 'Danh sách công ty' }}@stop

@section('content')
  {{--<a href="{{ route('admin.article.create') }}" class="btn btn-primary">Tạo công ty mới</a>--}}
  <hr>

  @if (count($companies) > 0)
    <p class="text-right">Trang {{ $companies->currentPage() }}/{{ $companies->lastPage() }} (Tổng {{ $companies->total() }})</p>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr class="bg-info">
          <th>Tiêu đề</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($companies as $company)
        <tr>
          <td>{{ $company->title }}</td>
          <td><a href="{{ route('admin.company.edit', $company->slug) }}" class="btn btn-info">Chỉnh sửa</a></td>
      </tr>
        @endforeach
      </tbody>
      </table>
    </div>
    
    <div class="text-center">{!! $companies->render() !!}</div>
  @else
    Chưa có công ty nào!
  @endif
@stop
