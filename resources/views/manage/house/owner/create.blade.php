@extends('manage.layout')

@section('meta_title')
  Chính chủ đăng tin
@stop

@section('title')
  Chính chủ đăng tin
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.owner.store') }}" method="POST" role="form" id="houseForm">
    <input type="hidden" id="owner_type" name="owner_type" value="{{ \App\Repositories\Resource\House\OwnerTypeOptions::CHINH_CHU  }}">
    @include('manage.house.partial.house._form', [
      'submitBtnText' => 'Đăng tin ngay',
      'checkUniqueUrl' => route('owner.unique')
    ])
  </form>
@stop