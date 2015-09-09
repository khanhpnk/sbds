@extends('manage.layout')

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.house.store') }}" method="POST" role="form" id="houseForm">
    @include('manage.house.houses._form', ['submitBtnText' => 'Cập nhật thay đổi'])
  </form>
@stop