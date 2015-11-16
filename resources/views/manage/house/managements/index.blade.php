@extends('manage.layout')

@section('title')
 Danh sách đăng tin
@stop

@section('content')
  <div class="message-toolbar">
    <a class="btn btn-primary" href="{{ route('manage.house.index', ConstHelper::URI_CHINH_CHU) }}" role="button">Chính chủ</a>
    <a class="btn btn-primary" href="{{ route('manage.house.index', ConstHelper::URI_MOI_GIOI) }}" role="button">Môi giới</a>
    <a class="btn btn-primary" href="{{ route('manage.house.index', ConstHelper::URI_DU_AN) }}" role="button">Dự án</a>
  </div>
  <hr>
  @if (0 < count($resources))
    <section class="list">
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($resources as $resource)
            @if (ConstHelper::URI_DU_AN == $filter)
              @include('manage.house.managements._article_project', ['model' => $resource])
            @else
              @include('manage.house.managements._article', ['model' => $resource])
            @endif
          @endforeach
        </div>
      </div>
    </section>
    <nav class="simple-pagination">{!! $resources->render() !!}</nav>
  @else
    Không có dữ liệu!
  @endif
@stop
