@extends('manage.layout')

@section('meta_title')
  Chính chủ đăng tin
@stop

@section('title')
  Chính chủ đăng tin
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.owner.update', ['id' => $house->id]) }}" method="POST" role="form" id="houseForm">
    <input type="hidden" name="_method" value="PUT">
    @include('manage.house.partial.house._form', ['submitBtnText' => 'Cập nhật thay đổi'])
  </form>
@stop