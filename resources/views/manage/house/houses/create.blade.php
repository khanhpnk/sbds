@extends('manage.layout')

@section('title')
  Chính chủ đăng tin
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

  <script>
    $(function() {
      var $city = [
        {id:1,text:'Hà Nội',district:[
          {id:1,text:'Hoàn Kiếm',ward:[
            {id:1,text:'Phường HK1'},{id:2,text:'Phường HK2'}
          ]},
          {id:2,text:'Hai Bà Trưng',ward:[
            {id:1,text:'Phường HBT1'},{id:2,text:'Phường HBT2'}
          ]},
        ]},
        {id:2,text:'Hồ Chí Minh',district:[
          {id:1,text:'Quận 1',ward:[
            {id:1,text:'Phường Q11'},{id:2,text:'Phường Q12'}
          ]},
          {id:2,text:'Quận 2',ward:[
            {id:1,text:'Phường Q21'},{id:2,text:'Phường Q22'}
          ]},
        ]},
      ];

      $('#city').select2({
        placeholder: "Tỉnh thành",
        data: $city
      });
      var $district;

      function getElementByText(jsonStore, text) {
        return jsonStore.filter(
            function(jsonStore){ return jsonStore.text == text }
        );
      }

      $('#city').on("select2:select", function (e) {
        var $element = getElementByText($city, this.options[e.target.selectedIndex].text);
        $district = $element[0].district;

        $("#district option:not(:first)").remove();
        $('#district').select2({
          placeholder: "Quận / huyện",
          data: $district
        });
      })

      $('#district').on("select2:select", function (e) {
        var $element = getElementByText($district, this.options[e.target.selectedIndex].text);

        $("#ward option:not(:first)").remove();
        $('#ward').select2({
          placeholder: "Xã / phường",
          data: $element[0].ward
        });
      })
    });
  </script>
@stop

@section('content')
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('house.store') }}" method="POST" role="form">
      {!! csrf_field() !!}
      @include('partial.form._text', ['name' => 'title', 'label' => 'Tiêu đề'])
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
          @include('partial.form._text', ['name' => 'price', 'label' => 'Giá tiền'])
        </div>
        <div class="col-md-2">
          @include('partial.form._select', ['name' => 'unit', 'label' => 'Đơn vị', 'option' => SellUnitOption::getOptions()])
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          @include('partial.form._select', ['name' => 'type', 'label' => 'Loại BĐS', 'option' => SellType::getOptions()])
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
          <div class="form-group">
            <label class="sr-only">Tỉnh thành</label>
            <select id="city" name="city" class="form-control" lang="vi" style="width: 100%">
              <option value="">Tỉnh thành</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          @include('partial.form._select', ['name' => 'district', 'label' => 'Quận / huyện', 'option' => []])
        </div>
        <div class="col-md-4">
          @include('partial.form._select', ['name' => 'ward', 'label' => 'Xã / phường', 'option' => []])
        </div>
      </div>

      @include('partial.form._text', ['name' => 'address', 'label' => 'Địa chỉ cụ thể'])
      <a class="btn btn-main" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>
      @include('partial.form._text', ['name' => 'youtube', 'label' => 'Đường dẫn video youtube'])
      @include('partial.form._textarea', ['name' => 'description', 'label' => 'Mô tả ngắn ngọn BĐS', 'rows' => 8])

      @include('manage.house.partial.section._detail_feature')
      <button type="submit" class="btn btn-primary btn-block">Đăng tin</button>
    </form>
@stop