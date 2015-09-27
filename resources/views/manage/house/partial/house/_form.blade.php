@section('javascript')
  @parent
  <script>
    $(function() {
      @if (isset($house->images))
        imageModule.setImagesDbJSON({!! json_encode($house->images) !!});
        imageModule.setImageUrl(publicUrl + "/upload/house/{{ $house->user_id }}/");
      @endif
      houseModule.setCheckUniqueUrl("{{ $checkUniqueUrl }}");
			houseModule.setMoneyUnitSale({!! MoneyUnitSaleOption::getJsonOptions() !!});
      houseModule.setMoneyUnitRent({!! MoneyUnitRentOption::getJsonOptions() !!});
      houseModule.setMoneyCategorySale({!! HouseCategorySaleOption::getJsonOptions() !!});
      houseModule.setMoneyCategoryRent({!! HouseCategoryRentOption::getJsonOptions() !!});

      houseModule.init();
      mapModule.init("form-map-canvas");

      locationModule.setLocationDbJSON({
        address: "{{ $house->address or '' }}",
        ward: "{{ $house->ward or '' }}",
        district: "{{ $house->district or '' }}",
        city: "{{ $house->city or '' }}"
      });
      delay(function(){locationModule.init()}, 2000);
    });
  </script>
  <script src="{{ asset('js/manage/house.js') }}"></script>
@stop

{!! csrf_field() !!}
<section>
  <div class="row">
      <div class="col-md-8">
          @include('partial.form._text', ['model' => $house, 'name' => 'title', 'label' => 'Tiêu đề'])
      </div>
    <div class="col-md-4">
      <label for="primary" class="btn btn-primary btn-badgebox">
          Đã bán thành công <input type="checkbox" id="primary" name="sold" class="badgebox" value="1"><span class="badge">&check;</span>
      </label>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      @include('partial.form._radio', ['name' => 'is_sale',
                                       'label' => 'Bán nhà',
                                       'checked' => is_null($house) || (!is_null($house) && IsSaleOption::BAN == $house->is_sale) ? true : false,
                                       'value' => IsSaleOption::BAN])
    </div>
    <div class="col-md-2">
      @include('partial.form._radio', ['name' => 'is_sale',
                                       'label' => 'Cho thuê',
                                       'checked' => (!is_null($house) && IsSaleOption::CHO_THUE == $house->is_sale) ? true : false,
                                       'value' => IsSaleOption::CHO_THUE])
    </div>
    <div class="col-md-4">
      @include('partial.form._text', ['model' => $house, 'name' => 'price', 'label' => 'Giá tiền'])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'money_unit',
                                        'label' => 'Đơn vị',
                                        'options' => (!is_null($house) && IsSaleOption::CHO_THUE == $house->is_sale) ? MoneyUnitRentOption::getOptions() : MoneyUnitSaleOption::getOptions(),
                                        'value' => !is_null($house) ? $house->money_unit : null])
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'category',
                                        'label' => 'Loại BĐS',
                                        'options' => (!is_null($house) && IsSaleOption::CHO_THUE == $house->is_sale) ? HouseCategoryRentOption::getOptions() : HouseCategorySaleOption::getOptions(),
                                        'value' => !is_null($house) ? $house->category : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._datepicker', ['model' => $house, 'name' => 'start_date', 'label' => 'Ngày bắt đầu'])
    </div>
    <div class="col-md-4">
      @include('partial.form._datepicker', ['model' => $house, 'name' => 'end_date', 'label' => 'Ngày kết thúc'])
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'city',
                                             'label' => 'Tỉnh thành',
                                             'options' => [],
                                             'value' => !is_null($house) ? $house->city : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'district',
                                             'label' => 'Quận / huyện',
                                             'options' => [],
                                             'value' => !is_null($house) ? $house->district : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'ward',
                                             'label' => 'Xã / phường',
                                             'options' => [],
                                             'value' => !is_null($house) ? $house->ward : null])
    </div>
  </div>
  @include('partial.form._text', ['model' => $house, 'name' => 'address', 'label' => 'Địa chỉ cụ thể'])

  <div id="form-map-canvas" style="height: 400px; width: 100%;"></div>
  <span id="helpBlock" class="help-block">
    *Trong trường hợp kết quả tìm kiếm không chính xác, nhấn chuột vào biểu tượng và di chuyển đến vị trí nhà đất của bạn.
  </span>
  @include('partial.form._hidden', ['model' => $house, 'name' => 'lat'])
  @include('partial.form._hidden', ['model' => $house, 'name' => 'lng'])

  <a class="btn btn-form-upload" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif" autocomplete="off"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>
  <input type="hidden" id="files_deleted" name="files_deleted">
  @include('partial.form._text', ['name' => 'youtube', 'label' => 'Đường dẫn video youtube'])
  <span id="helpBlock" class="help-block">
    *Xem thêm hướng dẫn cách đưa video lên youtube
  </span>
  @include('partial.form._textarea', ['model' => $house, 'name' => 'description', 'label' => 'Mô tả ngắn ngọn BĐS', 'rows' => 8])
</section>

<section>
  <header><h2 class="form-title">Chi tiết</h2></header>
  <div class="row">
    <div class="col-md-4">
      @include('partial.form._text',   ['model' => $house, 'name' => 'm2', 'label' => 'Diện tích sử dụng (m2)'])
      @include('partial.form._select', ['name' => 'toilet',
                                             'label' => 'Số phòng vệ sinh',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->toilet : null])
      @include('partial.form._select', ['name' => 'floors',
                                             'label' => 'Số tầng',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->floors : null])
      @include('partial.form._select', ['name' => 'direction',
                                             'label' => 'Hướng nhà',
                                             'options' => HouseDirectionOption::getOptions(),
                                             'value' => !is_null($house) ? $house->direction : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._text',   ['model' => $house, 'name' => 'road', 'label' => 'Đường trước nhà (m2)'])
      @include('partial.form._select', ['name' => 'bedroom',
                                             'label' => 'Số phòng ngủ',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->bedroom : null])
      @include('partial.form._select', ['name' => 'kitchen',
                                             'label' => 'Bếp',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->kitchen : null])
      @include('partial.form._select', ['name' => 'living_room',
                                             'label' => 'Phòng khách',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->living_room : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'common_room',
                                             'label' => 'Phòng sinh hoạt chung',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->common_room : null])
      @include('partial.form._select', ['name' => 'balcony',
                                             'label' => 'Ban công',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->balcony : null])
      @include('partial.form._select', ['name' => 'logia',
                                             'label' => 'Logia',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->logia : null])
      @include('partial.form._select', ['name' => 'license',
                                             'label' => 'Tình trạng pháp lý',
                                             'options' => HouseLicenseOption::getOptions(),
                                             'value' => !is_null($house) ? $house->license : null])
    </div>
  </div>
</section>

<section>
  <header><h2 class="form-title">Tính năng</h2></header>
  <ul class="row form-group">
    @foreach(HouseFeatureOption::getOptions() as $feature => $label)
      <li class="col-md-3">
        @include('partial.form._checbox', ['name' => 'feature[]',
																				'label' => $label,
																				'checked' => !is_null($house) && !is_null($house->feature) && in_array($feature, $house->feature) ? true : false,
																				'value' => $feature])
      </li>
    @endforeach
  </ul>
</section>

<button type="submit" class="btn btn-primary btn-block">{{ $submitBtnText }}</button>