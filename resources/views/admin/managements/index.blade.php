@extends('manage.layout')

@section('title')
 Danh sách đăng tin
@stop

@section('content')

  <div class="message-toolbar">
    <a class="btn btn-primary" href="{{ URL::full() }}&isApproved=0" role="button">Tin chưa duyệt</a>
    <a class="btn btn-primary" href="{{ URL::full() }}&isApproved=1" role="button">Tin đã duyệt</a>
  </div>
  <hr>

  @if (0 < count($resources))
    <section class="list">
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($resources as $resource)
            @if (3 == $type)
              @include('admin.managements._article_project', ['model' => $resource])
            @else
              @include('admin.managements._article', ['model' => $resource])
            @endif
          @endforeach
        </div>
      </div>
    </section>
    <nav class="simple-pagination">{!! $resources->appends(Input::except('page'))->render() !!}</nav>
  @else
    Không có dữ liệu!
  @endif
@stop
