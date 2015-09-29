@extends('manage.layout')

@section('title')
 Danh sách đăng tin
@stop

@section('content')
  @if (0 < count($resources))

    <div class="message-toolbar">
      <a class="btn btn-primary" href="{{ route('manage.house.index', ['filter' => AdminResourceUriOption::getLabel(AdminResourceUriOption::CHINH_CHU)]) }}" role="button">Chính chủ</a>
      <a class="btn btn-primary" href="{{ route('manage.house.index', ['filter' => AdminResourceUriOption::getLabel(AdminResourceUriOption::MOI_GIOI)]) }}" role="button">Môi giới</a>
      <a class="btn btn-primary" href="{{ route('manage.house.index', ['filter' => AdminResourceUriOption::getLabel(AdminResourceUriOption::DU_AN)]) }}" role="button">Dự án</a>
    </div>

    <section class="list">
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($resources as $resource)
            @if ('du-an' == $filter)
              @include('manage.house.managements._article_company', ['model' => $resource, 'resource' => ResourceOption::DU_AN])
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
