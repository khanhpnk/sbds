@extends('manage.layout')

@section('meta_title'){{ 'Danh sách thiết kế thi công' }}@stop
@section('meta_description'){{ 'Danh sách thiết kế thi công' }}@stop

@section('content')
  <a href="{{ route('admin.design.create') }}" class="btn btn-primary">Tạo thiết kế thi công mới</a>
  <hr>

  <div class="message-toolbar">
    <a class="btn btn-primary" href="{{ route('admin.design.index', 1) }}" role="button">Biệt thự phố</a>
    <a class="btn btn-primary" href="{{ route('admin.design.index', 2) }}" role="button">Biệt thự vườn</a>
    <a class="btn btn-primary" href="{{ route('admin.design.index', 3) }}" role="button">Nhà phố</a>
    <a class="btn btn-primary" href="{{ route('admin.design.index', 4) }}" role="button">Thể loại khác</a>
  </div>
  @if (count($designs) > 0)
    <section class="list">
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($designs as $design)
            @include('admin.design.designs._article', ['model' => $design])
          @endforeach
        </div>
      </div>
    </section>
    <nav class="simple-pagination">{!! $designs->render() !!}</nav>
  @else
    Chưa có thiết kế thi công nào!
  @endif
@stop
