@extends('manage.layout')

@section('title')
 Danh sách đăng tin
@stop

@section('content')
  @if (0 < count($resources))

    <div class="message-toolbar">
      <a class="btn btn-primary" href="{{ route('manage.house.index', ['filter' => ConstHelper::URI_CHINH_CHU]) }}" role="button">Chính chủ</a>
      <a class="btn btn-primary" href="{{ route('manage.house.index', ['filter' => ConstHelper::URI_MOI_GIOI]) }}" role="button">Môi giới</a>
      <a class="btn btn-primary" href="{{ route('manage.house.index', ['filter' => ConstHelper::URI_DU_AN]) }}" role="button">Dự án</a>
    </div>

    <section class="list">
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($resources as $resource)
            @if (ConstHelper::URI_DU_AN == $filter)
              @include('manage.house.managements._article_project', ['model' => $resource, 'resource' => ResourceOption::DU_AN])
            @else
              @include('manage.house.managements._article', ['model' => $resource, 'resource' => ResourceOption::NHA_DAT])
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
