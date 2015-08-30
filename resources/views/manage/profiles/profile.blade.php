@extends('manage.layout')

@section('title')
  Thông tin cá nhân
@stop

@section('style')
  @parent
  <link href="{{ asset('vendor/jquery.filer-master/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
@stop

@section('javascript')
  @parent
  <script type="text/javascript" src="{{ asset('vendor/jquery.filer-master/js/jquery.filer.js') }}"></script>
  <script>
    // Must edit core file, plugin is suck
    $(function() {
      $('.file-input').filer({
        limit: 1,
        addMore: false,
        files: [{
          name: "Ảnh đại diện",
          type: "image/jpg",
          file: "{{ UserHelper::avatar() }}",
        }],
      });
    });
  </script>
@stop

@section('content')
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST" role="form">
      {!! csrf_field() !!}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label class="sr-only">Họ và tên</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', UserHelper::name()) }}" placeholder="HỌ VÀ TÊN">
      </div>
      <div class="form-group">
        <label class="sr-only">Địa chỉ email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', UserHelper::email()) }}" placeholder="ĐỊA CHỈ EMAIL">
      </div>
      <div class="form-group">
        <label class="sr-only">Điện thoại</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}" placeholder="ĐIỆN THOẠI">
      </div>
      <div class="form-group">
        <label class="sr-only">Di động</label>
        <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $profile->mobile) }}" placeholder="DI ĐỘNG">
      </div>
      <div class="form-group">
        <label class="sr-only">Skype</label>
        <input type="text" name="skype" class="form-control" value="{{ old('skype', $profile->skype) }}" placeholder="SKYPE">
      </div>
      <div class="form-group">
        <label class="sr-only">Facebook</label>
        <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $profile->facebook) }}" placeholder="FACEBOOK">
      </div>
      <div class="form-group">
        <label class="sr-only">Website</label>
        <input type="text" name="website" class="form-control" value="{{ old('website', $profile->website) }}" placeholder="WEBSITE">
      </div>
      <div class="form-group">
        <label class="sr-only">Địa chỉ cụ thể</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $profile->address) }}" placeholder="ĐỊA CHỈ CỤ THỂ">
      </div>
      <a class="file-input" data-jfiler-name="avatar" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="icon-jfi-paperclip"></i> ẢNH ĐẠI DIỆN</a>
      <button type="submit" class="btn btn-primary btn-block">Thay đổi</button>
    </form>
@stop