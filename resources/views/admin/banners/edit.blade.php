@extends('manage.layout')

@section('meta_title'){{ 'Quản lý banner' }}@stop
@section('meta_description'){{ 'Quản lý banner' }}@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('admin.banner.update') }}" method="POST" role="form">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
      <label for="image">Ảnh banner cho Thiết Kế Thi Công</label>
      <input type="file" id="image" name="image" accept="image/*">
      <hr>
      <img width="665" src=" {{ ImageHelper::link('banner/' . $banner->image) }}">
    </div>



    <button type="submit" class="btn btn-primary btn-block">Tải ảnh</button>
  </form>
@stop
