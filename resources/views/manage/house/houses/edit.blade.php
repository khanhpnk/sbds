@extends('manage.layout')

@section('title')
  Chính chủ đăng tin
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.house.update', ['id' => $house->id]) }}" method="POST" role="form" id="houseForm">
    <input type="hidden" name="_method" value="PUT">
    @include('manage.house.houses._form', ['submitBtnText' => 'Đăng tin'])
  </form>
@stop