@extends('manage.layout')

@section('meta_title')
  Thông tin cá nhân
@stop

@section('title')
  Thông tin cá nhân
@stop

@section('javascript')
  @parent
  <script>
    $(function() {
      profileModule.setAvatarPath("{{ UserHelper::avatar() }}");
      profileModule.init();
      mapModule.init("form-map-canvas");

      locationModule.setLocationDbJSON({
        address: "{{ $house->address or '' }}",
        ward: "{{ (0 == $profile->ward) ? '' : $profile->ward }}",
        district: "{{ (0 == $profile->district) ? '' : $profile->district }}",
        city: "{{ (0 == $profile->city) ? '' : $profile->city }}"
      });
      delay(function(){locationModule.init()}, 1000);
    });
  </script>
  <script src="{{ asset('js/manage/profile.js') }}"></script>
@stop

@section('content')
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST" role="form" id="profileForm" class="form-horizontal">
      {!! csrf_field() !!}
      <input type="hidden" name="_method" value="PUT">
      <a class="btn btn-main" id="fileImage" data-jfiler-name="avatar" data-jfiler-extensions="jpg, jpeg, png, gif" autocomplete="off"><i class="icon-jfi-paperclip"></i> Tải ảnh đại diện</a>

      <div class="form-group">
        <label class="col-sm-3 control-label" for="name">Họ và tên</label>
        <div class="col-sm-9">
          <input type="text" name="name" id="name" class="form-control" value="{{ UserHelper::name() }}" placeholder="Họ và tên">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Địa chỉ email</label>
        <div class="col-sm-9">
          <input type="email" name="email" id="email" class="form-control" value="{{ UserHelper::email() }}" placeholder="Địa chỉ email">
        </div>
      </div>
      @include('partial.form.horizontal._text', ['model' => $profile, 'name' => 'phone', 'label' => 'Điện thoại'])
      @include('partial.form.horizontal._text', ['model' => $profile, 'name' => 'mobile', 'label' => 'Di động'])
      @include('partial.form.horizontal._text', ['model' => $profile, 'name' => 'skype', 'label' => 'Skype'])
      @include('partial.form.horizontal._text', ['model' => $profile, 'name' => 'facebook', 'label' => 'Facebook'])
      @include('partial.form.horizontal._text', ['model' => $profile, 'name' => 'website', 'label' => 'Website'])

          @include('partial.form.horizontal._select', ['name' => 'city',
																								 'label' => 'Tỉnh thành',
																								 'options' => [],
																								 'value' => $profile->city])


          @include('partial.form.horizontal._select', ['name' => 'district',
																								 'label' => 'Quận / huyện',
																								 'options' => [],
																								 'value' => $profile->district])


          @include('partial.form.horizontal._select', ['name' => 'ward',
																								 'label' => 'Xã / phường',
																								 'options' => [],
																								 'value' => $profile->ward])

      @include('partial.form.horizontal._text', ['model' => $profile, 'name' => 'address', 'label' => 'Địa chỉ cụ thể'])

      <div id="form-map-canvas" style="height: 400px; width: 100%;"></div>
      <span id="helpBlock" class="help-block">
        *Trong trường hợp kết quả tìm kiếm không chính xác, nhấn chuột vào biểu tượng và di chuyển đến vị trí của bạn.
      </span>
      @include('partial.form._hidden', ['model' => $profile, 'name' => 'lat'])
      @include('partial.form._hidden', ['model' => $profile, 'name' => 'lng'])

      <button type="submit" class="btn btn-primary btn-block">Thay đổi</button>
    </form>
@stop