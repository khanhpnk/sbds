@section('javascript')
  @parent
  <script>
    $(function() {
      @if (isset($house->images))
        imagesModule.setImagesDbJSON({!! json_encode($house->images) !!});
        imagesModule.setImageUrl("{{ ImageHelper::link(config('image.paths.house').'/'.$house->user_id) }}");
      @endif
      houseModule.setCheckUniqueUrl("{{ $checkUniqueUrl }}");
			houseModule.setMoneyUnitSale({!! MoneyUnitSaleOption::getJsonOptions() !!});
      houseModule.setMoneyUnitRent({!! MoneyUnitRentOption::getJsonOptions() !!});
      houseModule.setMoneyCategorySale({!! \App\Repositories\Resource\House\Sale\CategoryOptions::getJsonOptions() !!});
      houseModule.setMoneyCategoryRent({!! \App\Repositories\Resource\House\Rent\CategoryOptions::getJsonOptions() !!});
      houseModule.init();

      locationModule.setLocationDbJSON({
        address: "{{ $house->address or '' }}",
        ward: "{{ $house->ward or '' }}",
        district: "{{ $house->district or '' }}",
        city: "{{ $house->city or '' }}"
      });

      mapModule.init("form-map-canvas");
    });
  </script>
  <script src="{{ asset('js/manage/house.js') }}"></script>
@stop

{!! csrf_field() !!}
<section>
  <div class="row">
      <div class="col-md-8">
          @include('partial.form._text', ['model' => $house, 'name' => 'title', 'label' => 'Tiêu đề (Nhập từ 8 đến 60 ký tự)', 'hideLable' => true])
      </div>
    <div class="col-md-4">
      <label for="primary" class="btn btn-primary btn-badgebox">
          Đã bán thành công <input type="checkbox" id="primary" name="is_sold" class="badgebox" value="1"><span class="badge">&check;</span>
      </label>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      @include('partial.form._radio', ['name' => 'sale_type',
                                       'label' => 'Bán nhà',
                                       'checked' => is_null($house) || (!is_null($house) && \App\Repositories\Resource\House\SaleTypeOptions::BAN == $house->sale_type) ? true : false,
                                       'value' => \App\Repositories\Resource\House\SaleTypeOptions::BAN])
    </div>
    <div class="col-md-2">
      @include('partial.form._radio', ['name' => 'sale_type',
                                       'label' => 'Cho thuê',
                                       'checked' => (!is_null($house) && \App\Repositories\Resource\House\SaleTypeOptions::CHO_THUE == $house->sale_type) ? true : false,
                                       'value' => \App\Repositories\Resource\House\SaleTypeOptions::CHO_THUE])
    </div>
    <div class="col-md-4">
      @include('partial.form._text', ['model' => $house, 'name' => 'price', 'label' => 'Giá tiền', 'hideLable' => true])
    </div>
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'money_unit',
                                        'label' => 'Đơn vị',
                                        'options' => (!is_null($house) && \App\Repositories\Resource\House\SaleTypeOptions::CHO_THUE == $house->sale_type) ? MoneyUnitRentOption::getOptions() : MoneyUnitSaleOption::getOptions(),
                                        'value' => !is_null($house) ? $house->money_unit : null])
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'category',
                                        'label' => 'Loại BĐS',
                                        'options' => (!is_null($house) && \App\Repositories\Resource\House\SaleTypeOptions::CHO_THUE == $house->sale_type) ? \App\Repositories\Resource\House\Rent\CategoryOptions::getOptions() : \App\Repositories\Resource\House\Sale\CategoryOptions::getOptions(),
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
      @include('partial.form._select2', ['name' => 'city',
                                             'label' => 'Tỉnh thành',
                                             'options' => [],
                                             'value' => !is_null($house) ? $house->city : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'district',
                                             'label' => 'Quận / huyện',
                                             'options' => [],
                                             'value' => !is_null($house) ? $house->district : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'ward',
                                             'label' => 'Xã / phường',
                                             'options' => [],
                                             'value' => !is_null($house) ? $house->ward : null])
    </div>
  </div>
  @include('partial.form._text', ['model' => $house, 'name' => 'address', 'label' => 'Địa chỉ cụ thể', 'hideLable' => true])

  <div id="form-map-canvas" style="height: 400px; width: 100%;"></div>
  <span id="helpBlock" class="help-block">
    *Trong trường hợp kết quả tìm kiếm không chính xác, nhấn chuột vào biểu tượng và di chuyển đến vị trí nhà đất của bạn.
  </span>
  @include('partial.form._hidden', ['model' => $house, 'name' => 'lat'])
  @include('partial.form._hidden', ['model' => $house, 'name' => 'lng'])

  <a class="btn btn-form-upload" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif" autocomplete="off"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>
  <input type="hidden" id="files_deleted" name="files_deleted">
  @include('partial.form._text', ['model' => $house, 'name' => 'youtube', 'label' => 'Đường dẫn video youtube', 'hideLable' => true])
  <span id="helpBlock" class="help-block">
    *Xem thêm hướng dẫn cách đưa video lên youtube
  </span>
  @include('partial.form._textarea', ['model' => $house, 'name' => 'description', 'label' => 'Mô tả ngắn ngọn BĐS (Nhập từ 8 đến 6000 ký tự)', 'rows' => 8])
</section>

<section>
  <header><h2 class="form-title">Chi tiết</h2></header>
  <div class="row">
    <div class="col-md-4">
      @include('partial.form._text',   ['model' => $house, 'name' => 'm2', 'label' => 'Diện tích sử dụng (m2)', 'hideLable' => true])
      @include('partial.form._select2', ['name' => 'toilet',
                                             'label' => 'Số phòng vệ sinh',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->toilet : null])
      @include('partial.form._select2', ['name' => 'floors',
                                             'label' => 'Số tầng',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->floors : null])
      @include('partial.form._select2', ['name' => 'direction',
                                             'label' => 'Hướng nhà',
                                             'options' => HouseDirectionOption::getOptions(),
                                             'value' => !is_null($house) ? $house->direction : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._text',   ['model' => $house, 'name' => 'road', 'label' => 'Đường trước nhà (m2)', 'hideLable' => true])
      @include('partial.form._select2', ['name' => 'bedroom',
                                             'label' => 'Số phòng ngủ',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->bedroom : null])
      @include('partial.form._select2', ['name' => 'kitchen',
                                             'label' => 'Bếp',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->kitchen : null])
      @include('partial.form._select2', ['name' => 'living_room',
                                             'label' => 'Phòng khách',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->living_room : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'common_room',
                                             'label' => 'Phòng sinh hoạt chung',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->common_room : null])
      @include('partial.form._select2', ['name' => 'balcony',
                                             'label' => 'Ban công',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->balcony : null])
      @include('partial.form._select2', ['name' => 'logia',
                                             'label' => 'Logia',
                                             'options' => [1 => 1,2,3,4,5,6,7,8,9,10],
                                             'value' => !is_null($house) ? $house->logia : null])
      @include('partial.form._select2', ['name' => 'license',
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