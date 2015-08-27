@extends('manage.layout')

@section('title')
  Đổi mật khẩu
@stop

@section('content')
    <form accept-charset="UTF-8" action="{{ route('password.update') }}" method="POST" role="form">
      {!! csrf_field() !!}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label class="sr-only">Mật khẩu mới</label>
        <input type="password" style="display: none">
        <input type="password" name="password" class="form-control" placeholder="NHẬP MẬT KHẨU MỚI">
      </div>
      <div class="form-group">
        <label class="sr-only">Nhập lại mất khẩu</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="NHẬP LẠI MẬT KHẨU MỚI">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Thay đổi</button>
    </form>
@stop