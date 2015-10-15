@extends('layout')

@section('meta_title'){{ 'Thiết lập lại mật khẩu' }}@stop
@section('meta_description'){{ 'Thiết lập lại mật khẩu' }}@stop

@section('breadcrumb')
  <li class="active">Thiết lập lại mật khẩu</li>
@stop

@section('content')
  @include ('errors._list')

  <form accept-charset="UTF-8" method="POST" action="/password/reset" role="form">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
      <label for="email">Email</label>
      <input  type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="email">Mật khẩu mới</label>
      <input  type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="email">Nhập lại mật khẩu mới</label>
      <input  type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Gửi</button>
  </form>
@stop