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
@stop

@section('content')
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('self.store') }}" method="POST" role="form">
      {!! csrf_field() !!}
      <div class="form-group">
        <label class="sr-only">Tiêu đề</label>
        <input type="text" name="title" class="form-control" value="" placeholder="Tiêu đề">
      </div>

      <div class="row">
        <div class="col-md-2">
          <div class="radio">
            <label><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Bán nhà</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="radio">
            <label><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Cho thuê nhà</label>
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
            <input type="text" name="date_start" class="form-control" value="" placeholder="Ngày bắt đầu">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Ngày kết thúc</label>
            <input type="text" name="date_end" class="form-control" value="" placeholder="Ngày kết thúc">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Tỉnh thành</label>
            <select name="" class="form-control">
              <option value="">Tỉnh thành</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Quận / huyện</label>
            <select name="" class="form-control">
              <option value="">Quận / huyện</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="sr-only">Xã / phường</label>
            <select name="" class="form-control">
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

      @include('manage.property._detail')
      @include('manage.property._feature')

      <button type="submit" class="btn btn-primary btn-block">Đăng tin</button>
    </form>
@stop