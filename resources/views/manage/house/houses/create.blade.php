@extends('manage.layout')

@section('title')
  Chính chủ đăng tin
@stop

@section('jshead')
  @parent
  <script>
    var unitRent = {!! RentUnitOption::getJsonOptions() !!};
    var unitSell = {!! SellUnitOption::getJsonOptions() !!};
    var sellType = {!! HouseSellType::getJsonOptions() !!};
    var rentType = {!! HouseRentType::getJsonOptions() !!};
  </script>
@stop

@section('content')
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('house.store') }}" method="POST" role="form" id="houseForm">
      {!! csrf_field() !!}
      @include('partial.form._text', ['name' => 'title', 'label' => 'Tiêu đề'])
      <div class="row">
        <div class="col-md-1">
          <div class="radio">
            <label><input type="radio" name="type" value="1" checked>Bán</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="radio">
            <label><input type="radio" name="type" value="2">Cho thuê</label>
          </div>
        </div>
        <div class="col-md-2">
          @include('partial.form._text', ['name' => 'price', 'label' => 'Giá tiền'])
        </div>
        <div class="col-md-2">
          @include('partial.form._select', ['name' => 'unit', 'label' => 'Đơn vị', 'option' => SellUnitOption::getOptions()])
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          @include('partial.form._select', ['name' => 'type', 'label' => 'Loại BĐS', 'option' => HouseSellType::getOptions()])
        </div>
        <div class="col-md-4">
          @include('partial.form._datepicker', ['name' => 'start_date', 'label' => 'Ngày bắt đầu'])
        </div>
        <div class="col-md-4">
          @include('partial.form._datepicker', ['name' => 'end_date', 'label' => 'Ngày kết thúc'])
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          @include('partial.form._select', ['name' => 'city', 'label' => 'Tỉnh thành', 'option' => []])
        </div>
        <div class="col-md-4">
          @include('partial.form._select', ['name' => 'district', 'label' => 'Quận / huyện', 'option' => []])
        </div>
        <div class="col-md-4">
          @include('partial.form._select', ['name' => 'ward', 'label' => 'Xã / phường', 'option' => []])
        </div>
      </div>
      @include('partial.form._text', ['name' => 'address', 'label' => 'Địa chỉ cụ thể'])

      <div id="form-map-canvas" style="height: 400px; width: 100%;"></div>
      <input type="hidden" id="lat" name="lat">
      <input type="hidden" id="lng" name="lng">

      <a class="btn btn-main" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>
      @include('partial.form._text', ['name' => 'youtube', 'label' => 'Đường dẫn video youtube'])
      @include('partial.form._textarea', ['name' => 'description', 'label' => 'Mô tả ngắn ngọn BĐS', 'rows' => 8])

      @include('manage.house.partial.section._detail_feature')

      <button type="submit" class="btn btn-primary btn-block">Đăng tin</button>
    </form>
@stop