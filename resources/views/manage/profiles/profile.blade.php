@extends('manage.layout')

@section('title')
  Thông tin cá nhân
@stop

@section('content')
    <form accept-charset="UTF-8" action="{{ route('profile.update') }}" method="POST" role="form">
      {!! csrf_field() !!}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label class="sr-only">Họ và tên</label>
        <input type="text" name="name" class="form-control" placeholder="HỌ VÀ TÊN">
      </div>
      <div class="form-group">
        <label class="sr-only">Địa chỉ email</label>
        <input type="email" name="email" class="form-control" placeholder="ĐỊA CHỈ EMAIL">
      </div>
      <div class="form-group">
        <label class="sr-only">Điện thoại</label>
        <input type="text" name="phone" class="form-control" placeholder="ĐIỆN THOẠI">
      </div>
      <div class="form-group">
        <label class="sr-only">Di động</label>
        <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $profile->mobile) }}" placeholder="DI ĐỘNG">
      </div>
      <div class="form-group">
        <label class="sr-only">Skype</label>
        <input type="text" name="skype" class="form-control" placeholder="SKYPE">
      </div>
      <div class="form-group">
        <label class="sr-only">Facebook</label>
        <input type="text" name="facebook" class="form-control" placeholder="FACEBOOK">
      </div>
      <div class="form-group">
        <label class="sr-only">Website</label>
        <input type="text" name="website" class="form-control" placeholder="WEBSITE">
      </div>
      <div class="form-group">
        <label class="sr-only">Địa chỉ cụ thể</label>
        <input type="text" name="address" class="form-control" placeholder="ĐỊA CHỈ CỤ THỂ">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Thay đổi</button>
    </form>
@stop