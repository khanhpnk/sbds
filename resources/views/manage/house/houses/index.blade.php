@extends('manage.layout')

@section('title')
 Danh sách đăng tin
@stop

@section('content')
  @if (count($houses) > 0)
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
          <th>Tên</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($houses as $house)
          <tr>
            <td>{{ $house->title }}</td>
            <td>{{ $house->price }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <div class="text-center">{!! $houses->render() !!}</div>
  @else
    Chua co ban ghi nao
  @endif
@stop
