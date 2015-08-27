@extends('manage.layout')

@section('title')
  Đổi mật khẩu
@stop

@section('content')
    <form accept-charset="UTF-8" action="{{ route('user.password.update') }}" method="POST" role="form">
      {!! csrf_field() !!}
      <div class="form-group">
        <label class="sr-only">New Password</label>
        <input type="password" style="display: none">
        <input type="password" name="password" class="form-control" placeholder="NHẬP MẬT KHẨU MỚI">
      </div>
      <div class="form-group">
        <label class="sr-only">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="NHẬP LẠI MẬT KHẨU MỚI">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
    </form>
@stop