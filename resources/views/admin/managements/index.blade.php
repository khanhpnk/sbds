@extends('manage.layout')

@section('title')
 Danh sách đăng tin
@stop

@section('content')

  <div class="message-toolbar">
    <a class="btn btn-primary" href="#" role="button">Tin chưa duyệt</a>
    <a class="btn btn-primary" href="#" role="button">Tin đã duyệt</a>
  </div>
  <hr>

  @if (0 < count($resources))
    <section class="list">
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($resources as $resource)
            @include('admin.managements._article', ['model' => $resource])
          @endforeach
        </div>
      </div>
    </section>
    <nav class="simple-pagination">{!! $resources->render() !!}</nav>
  @else
    Không có dữ liệu!
  @endif
@stop
