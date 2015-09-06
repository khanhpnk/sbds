{!! csrf_field() !!}
<section>
  @include('partial.form._text', ['name' => 'title', 'label' => 'Tiêu đề'])
  <div class="row">
    <div class="col-md-1">
      @include('partial.form._radio', ['model' => isset($house) ? $house : null,
                                       'name' => 'type',
                                       'label' => 'Bán',
                                       'value' => 1])
    </div>
    <div class="col-md-3">
      @include('partial.form._radio', ['model' => isset($house) ? $house : null,
                                       'name' => 'type',
                                       'label' => 'Cho thuê',
                                       'value' => 2])
    </div>
    <div class="col-md-2">
      @include('partial.form._text', ['name' => 'price', 'label' => 'Giá tiền'])
    </div>
    <div class="col-md-2">
      @include('partial.form._select', ['name' => 'money_unit', 'label' => 'Đơn vị', 'option' => MoneyUnitSaleOption::getOptions()])
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'category', 'label' => 'Loại BĐS', 'option' => HouseCategorySaleOption::getOptions()])
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
</section>

<section>
  <header><h2 class="form-title">Chi tiết</h2></header>
  <div class="row">
    <div class="col-md-4">
      @include('partial.form._text',   ['name' => 'm2', 'label' => 'Diện tích sử dụng (m2)'])
      @include('partial.form._select', ['name' => 'toilet', 'label' => 'Số phòng vệ sinh', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'floors', 'label' => 'Số tầng', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'direction', 'label' => 'Hướng nhà', 'option' => HouseDirectionOption::getOptions()])
    </div>
    <div class="col-md-4">
      @include('partial.form._text',   ['name' => 'road', 'label' => 'Đường trước nhà'])
      @include('partial.form._select', ['name' => 'bedroom', 'label' => 'Số phòng ngủ', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'kitchen', 'label' => 'Bếp', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'living_room', 'label' => 'Phòng khách', 'option' => [1,2,3,4,5,6,7,8,9,10]])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'common_room', 'label' => 'Phòng sinh hoạt chung', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'balcony', 'label' => 'Ban công', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'logia', 'label' => 'Logia', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'license', 'label' => 'Tình trạng pháp lý', 'option' => HouseLicenseOption::getOptions()])
    </div>
  </div>
</section>

<section>
  <header><h2 class="form-title">Tính năng</h2></header>
  <div class="row">
    @for ($i = 0; $i < count(HouseFeatureOption::getOptions());  $i++)
      @if (0 == $i % 6) <div class="col-md-3"> @endif
        <div class="checkbox">
          <label><input name="feature[]" type="checkbox" value="{{ $i }}" @if (isset($house) && in_array($i, $house->feature)) checked @endif > {{ HouseFeatureOption::getLabel($i) }}</label>
        </div>
        @if (0 == ($i + 1) % 6) </div> @endif
    @endfor
  </div>
</section>

<button type="submit" class="btn btn-primary btn-block">{{ $submitBtnText }}</button>