{!! csrf_field() !!}
<section>
  @include('partial.form._text', ['name' => 'title', 'label' => 'Tiêu đề'])
  <div class="row">
    <div class="col-md-1">
      @include('partial.form._radio', ['name' => 'type',
                                            'label' => 'Bán',
                                            'checked' => !isset($house) || (isset($house) && 1 == $house->type) ? true : false,
                                            'value' => 1])
    </div>
    <div class="col-md-3">
      @include('partial.form._radio', ['name' => 'type',
                                       'label' => 'Cho thuê',
                                       'checked' => (isset($house) && 2 == $house->type) ? true : false,
                                       'value' => 2])
    </div>
    <div class="col-md-2">
      @include('partial.form._text', ['name' => 'price', 'label' => 'Giá tiền'])
    </div>
    <div class="col-md-2">
      @include('partial.form._select', ['name' => 'money_unit',
                                        'label' => 'Đơn vị',
                                        'options' => (isset($house) && 2 == $house->type) ? MoneyUnitRentOption::getOptions() : MoneyUnitSaleOption::getOptions(),
                                        'value' => isset($house) ? $house->money_unit : null])
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'category',
                                        'label' => 'Loại BĐS',
                                        'options' => (isset($house) && 2 == $house->type) ? HouseCategoryRentOption::getOptions() : HouseCategorySaleOption::getOptions(),
                                        'value' => isset($house) ? $house->category : null])
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
      @include('partial.form._select', ['name' => 'city',
                                             'label' => 'Tỉnh thành',
                                             'options' => isset($house) ? [] : [],
                                             'value' => isset($house) ? $house->city : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'district',
                                             'label' => 'Quận / huyện',
                                             'options' => isset($house) ? [] : [],
                                             'value' => isset($house) ? $house->district : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'ward',
                                             'label' => 'Xã / phường',
                                             'options' => isset($house) ? [] : [],
                                             'value' => isset($house) ? $house->ward : null])
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
      @include('partial.form._select', ['name' => 'toilet',
                                             'label' => 'Số phòng vệ sinh',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->toilet : null])
      @include('partial.form._select', ['name' => 'floors',
                                             'label' => 'Số tầng',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->floors : null])
      @include('partial.form._select', ['name' => 'direction',
                                             'label' => 'Hướng nhà',
                                             'options' => HouseDirectionOption::getOptions(),
                                             'value' => isset($house) ? $house->direction : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._text',   ['name' => 'road', 'label' => 'Đường trước nhà'])
      @include('partial.form._select', ['name' => 'bedroom',
                                             'label' => 'Số phòng ngủ',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->bedroom : null])
      @include('partial.form._select', ['name' => 'kitchen',
                                             'label' => 'Bếp',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->kitchen : null])
      @include('partial.form._select', ['name' => 'living_room',
                                             'label' => 'Phòng khách',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->living_room : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'common_room',
                                             'label' => 'Phòng sinh hoạt chung',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->common_room : null])
      @include('partial.form._select', ['name' => 'balcony',
                                             'label' => 'Ban công',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->balcony : null])
      @include('partial.form._select', ['name' => 'logia',
                                             'label' => 'Logia',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => isset($house) ? $house->logia : null])
      @include('partial.form._select', ['name' => 'license',
                                             'label' => 'Tình trạng pháp lý',
                                             'options' => HouseLicenseOption::getOptions(),
                                             'value' => isset($house) ? $house->license : null])
    </div>
  </div>
</section>

<section>
  <header><h2 class="form-title">Tính năng</h2></header>
  <div class="row">
    @for ($i = 0; $i < count(HouseFeatureOption::getOptions());  $i++)
      @if (0 == $i % 6) <div class="col-md-3"> @endif
        @include('partial.form._checbox', ['name' => 'feature[]',
                                                'label' => HouseFeatureOption::getLabel($i),
                                                'checked' => isset($house) && !is_null($house->feature) && in_array($i, $house->feature) ? true : false,
                                                'value' => $i])
        @if (0 == ($i + 1) % 6) </div> @endif
    @endfor
  </div>
</section>

<button type="submit" class="btn btn-primary btn-block">{{ $submitBtnText }}</button>