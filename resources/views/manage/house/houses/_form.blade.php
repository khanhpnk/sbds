@section('meta_title')
  Chính chủ đăng tin
@stop

@section('title')
  Chính chủ đăng tin
@stop

@section('jshead')
  @parent
  <script>
    var moneyUnitSale     = {!! MoneyUnitSaleOption::getJsonOptions() !!};
    var moneyUnitRent     = {!! MoneyUnitRentOption::getJsonOptions() !!};
    var houseCategorySale = {!! HouseCategorySaleOption::getJsonOptions() !!};
    var houseCategoryRent = {!! HouseCategoryRentOption::getJsonOptions() !!};

    var locationDbJSON = {
      address: "{!! $house->address or '' !!}",
      ward: "{{ $house->ward or '' }}",
      district: "{{ $house->district or '' }}",
      city: "{{ $house->city or '' }}"
    };


    var imagesDbJSON = {!! isset($house->images) ? json_encode($house->images) : '' !!};
  </script>
@stop

@section('javascript')
  @parent
  <script>
    $(function() {
      $.mockjax({
        url: "house.action",
        response: function(settings) {
          var house = settings.data.title,
              houses = ["12345678", "aaaaaaaa"];
          this.responseText = "true";
          if ($.inArray(house, houses) !== -1) {
            this.responseText = "false";
          }
        },
        responseTime: 500
      });

      // just for the demos, avoids form submit
      //jQuery.validator.setDefaults({debug: true, success: "valid"});
      $('form').validate({
        rules: {
          title: {rangelength: [8, 64], required: true, remote: "house.action"}, // thingking
          price: {maxlength: 16, digits: true, required: true},　// thingking
          money_unit: {required: true},
          category: {required: true},
          city: {required: true},
          district: {required: true},
          ward: {required: true},
          youtube: {url: true},
          description: {rangelength: [8, 2000], required: true},
          m2: {digits: true, maxlength: 16},
          road: {maxlength: 64},
        },
        messages: {
          title: {
            required: "Bạn cần nhập tiêu đề.",
            minlength: jQuery.validator.format("Bạn cần nhập ít nhất {0} ký tự"),
            remote: jQuery.validator.format("Tiêu đề với nội dung {0} là đã được sử dụng")
          },
          price: "Bạn cần nhập giá tiền.",
        },
        highlight: function(element) {
          $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
          $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
          if (element.is("select")) {
            error.appendTo(element.closest('.form-group'));
          } else {
            error.insertAfter(element);
          }
        }
      });
    });
  </script>
@stop

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