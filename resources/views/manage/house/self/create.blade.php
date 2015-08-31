@extends('manage.layout')

@section('title')
  Chính chủ đăng tin
@stop

@section('style')
  @parent
  <link href="{{ asset('vendor/jquery.filer-master/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
  <style>
    .form-title {
      font-size: 18px;
      padding: 6px 12px;
      margin: 10px 0;
      text-transform: uppercase;
      background-color: #F0F0F0;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.css" rel="stylesheet" />
@stop

@section('javascript')
  @parent
  <script type="text/javascript" src="{{ asset('vendor/jquery.filer-master/js/jquery.filer.js') }}"></script>
  <script>
    // Must edit core file, plugin is suck
    $('#fileImage').filer({
      limit: 20,
      maxSize: 2, // MB
      addMore: true,
      files: [{
        name: "appended_file.jpg",
        size: 5453,
        type: "image/jpg",
        file: "http://dummyimage.com/158x113/f9f9f9/191a1a.jpg",
      },{
        name: "appended_file_2.png",
        size: 9503,
        type: "image/png",
        file: "http://dummyimage.com/158x113/f9f9f9/191a1a.png",
      }]
    });
  </script>
  <!-- Selected option -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.js"></script>
  <script>
    $(function() {
      var $city = [
        {
          id: 1,
          text: 'Hà Nội',
          district: [
            {
              id: 1,
              text: 'Hoàn Kiếm'
            },
            {
              id: 2,
              text: 'Hai Bà Trưng'
            }
          ]
        },
        {
          id: 2,
          text: 'Hồ Chí Minh',
          district: [
            {
              id: 1,
              text: 'Quận 1'
            },
            {
              id: 2,
              text: 'Quận 2'
            }
          ]
        }
      ];

      $('#city').select2();
//      $('#district').select2({
//        placeholder: "Quận / huyện",
//      });
//
      function getElementByText(text) {
        return $city.filter(
            function($city){ return $city.text == text }
        );
      }

      //minimumResultsForSearch: Infinity, // Hiding the search box
      $('#city').on("change", function (e) {
        var $citySelected = this.options[e.target.selectedIndex].text;
        var $element = getElementByText($citySelected);

        $('#district').select2({
          data: $element[0].district
        })
      })
    });
  </script>
  <script type="text/javascript">
    $(function() {
      $('.datepicker').pickadate({
        format: 'dd/mm/yyyy',
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true,
        min: true, // today
        max: +31, // relative to today
      });
    });
  </script>
@stop

@section('content')
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('house.store') }}" method="POST" role="form">
      {!! csrf_field() !!}
      <select name="attribute" id="attribute">
        <option value="0">Color</option>
        <option value="1">Size</option>
      </select>
      <div class="form-group">
        <label class="sr-only">Tiêu đề</label>
        <input type="text" name="title" class="form-control" value="" placeholder="Tiêu đề">
      </div>
      <div class="row">
        <div class="col-md-1">
          <div class="radio">
            <label><input type="radio" name="category" value="1">Bán</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="radio">
            <label><input type="radio" name="category" value="2" checked>Cho thuê</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label class="sr-only">Giá tiền</label>
            <input type="text" name="price" class="form-control" value="" placeholder="Giá tiền">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label class="sr-only">Đơn vị</label>
            <select name="unit" class="form-control">
              @foreach (SellUnitOption::getOptions() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Loại BĐS</label>
            <select name="type" class="form-control">
              <option value="">Loại BĐS</option>
              @foreach (SellType::getOptions() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Ngày bắt đầu</label>
            <input type="text" name="start_date" class="form-control datepicker" {{--data-value="2015-09-12"--}} placeholder="Ngày bắt đầu">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Ngày kết thúc</label>
            <input type="text" name="end_date" class="form-control datepicker" value="" placeholder="Ngày kết thúc">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Tỉnh thành</label>
            <select id="city" name="city" class="form-control" style="width: 100%">
              <option value="">Tỉnh thành</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Quận / huyện</label>
            <select id="district" name="district" class="form-control">
              <option value="">Quận / huyện</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Xã / phường</label>
            <select name="ward" class="form-control">
              <option value="">Xã / phường</option>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="sr-only">Địa chỉ cụ thể</label>
        <input type="text" name="address" class="form-control" value="" placeholder="Địa chỉ cụ thể">
      </div>

      <a class="btn btn-main" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>

      <div class="form-group">
        <label class="sr-only">Đường dẫn video youtube</label>
        <input type="text" name="youtube" class="form-control" value="" placeholder="Đường dẫn video youtube">
      </div>
      <div class="form-group">
        <label class="sr-only">Mô tả ngắn ngọn về BĐS</label>
        <textarea rows="8" name="description" class="form-control" placeholder="Mô tả ngắn ngọn về BĐS"></textarea>
      </div>

      @include('manage.house._detail')
      @include('manage.house._feature')

      <button type="submit" class="btn btn-primary btn-block">Đăng tin</button>
    </form>
@stop