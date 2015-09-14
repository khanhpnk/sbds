@extends('manage.layout')

@section('meta_title')
  Chính chủ đăng tin
@stop

@section('title')
  Chính chủ đăng tin
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.owner.store') }}" method="POST" role="form" id="houseForm">
    <input type="hidden" id="is_owner" name="is_owner" value="1">
    @include('manage.house.partial.house._form', [
      'submitBtnText' => 'Đăng tin ngay',
      'checkUniqueUrl' => route('owner.unique')
    ])
  </form>
@stop