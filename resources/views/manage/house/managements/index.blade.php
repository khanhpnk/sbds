@extends('manage.layout')

@section('title')
 Danh sách đăng tin
@stop

@section('content')
  @if (0 < count($houses))

    <div class="message-toolbar">
      <a class="btn btn-primary" href="{{ route('m.management.index', ['filter' => ResourceOption::CHINH_CHU]) }}" role="button">Chính chủ</a>
      <a class="btn btn-primary" href="{{ route('m.management.index', ['filter' => ResourceOption::MOI_GIOI]) }}" role="button">Môi giới</a>
      <a class="btn btn-primary" href="{{ route('m.management.index', ['filter' => ResourceOption::DU_AN]) }}" role="button">Dự án</a>
    </div>

    <section class="list">
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($houses as $house)
            @include('manage.partial._article', ['model' => $house,
                                                      'resource' => $resource,
                                                      'col' => 4, 'iw' => 200, 'ih' => 150])
          @endforeach
        </div>
      </div>
    </section>
    <nav class="simple-pagination">{!! $houses->render() !!}</nav>
  @else
    Không có dữ liệu!
  @endif
@stop
