@section('javascript')
  @parent
  <script>
    $(function() {
      @if (isset($design->images))
        imagesModule.setImagesDbJSON({!! json_encode($design->images) !!});
        imagesModule.setImageUrl("{{ ImageHelper::link(config('image.paths.design').'/1') }}"); // fixed code
      @endif
      designModule.setCheckUniqueUrl("{{ route('design.unique') }}");
      designModule.init();
      locationModule.setLocationDbJSON({
        address: "{{ $design->address or '' }}",
        ward: "{{ $design->ward or '' }}",
        district: "{{ $design->district or '' }}",
        city: "{{ $design->city or '' }}"
      });

      mapModule.init("form-map-canvas");

    });
  </script>
  <script src="{{ asset('js/admin/design.js') }}"></script>
@endsection

<div id="form-fieldset3" class="form-fieldset" style="display: none;">
  <fieldset>
    <legend>Step 3 of 3</legend>

    @include('partial.form._text', [
      'model' => $design,
      'name' => 'title',
      'label' => 'Tiêu đề'
     ])
    <div class="row">
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'designers',
          'label' => 'Tên người thiết kế'
         ])
      </div>
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'designers_furniture',
          'label' => 'Tên người thiết kế nội thất'
        ])
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'supervisor',
          'label' => 'Tên người giám sát'
        ])
      </div>
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'year',
          'label' => 'Năm thiết kế'
        ])
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'land_m2',
          'label' => 'Diện tích lô đất'
         ])
      </div>
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'build_m2',
          'label' => 'Diện tích xây dựng'
        ])
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'number_of_floors',
          'label' => 'Số tầng'
        ])
      </div>
      <div class="col-md-6">
        @include('partial.form._text', [
          'model' => $design,
          'name' => 'frontage_m2',
          'label' => 'Bề rộng mặt tiền'
        ])
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        @include('partial.form._select2', ['name' => 'city',
                                               'label' => 'Tỉnh thành',
                                               'options' => [],
                                               'value' => !is_null($design) ? $design->city : null])
      </div>
      <div class="col-md-4">
        @include('partial.form._select2', ['name' => 'district',
                                               'label' => 'Quận / huyện',
                                               'options' => [],
                                               'value' => !is_null($design) ? $design->district : null])
      </div>
      <div class="col-md-4">
        @include('partial.form._select2', ['name' => 'ward',
                                               'label' => 'Xã / phường',
                                               'options' => [],
                                               'value' => !is_null($design) ? $design->ward : null])
      </div>
    </div>
    @include('partial.form._text', ['model' => $design, 'name' => 'address', 'label' => 'Địa chỉ cụ thể', 'hideLable' => true])

    <div id="form-map-canvas" style="height: 400px; width: 100%;"></div>
    <span id="helpBlock" class="help-block">
      *Trong trường hợp kết quả tìm kiếm không chính xác, nhấn chuột vào biểu tượng và di chuyển đến vị trí nhà đất của bạn.
    </span>
      @include('partial.form._hidden', ['model' => $design, 'name' => 'lat'])
      @include('partial.form._hidden', ['model' => $design, 'name' => 'lng'])

      <a class="btn btn-form-upload" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif" autocomplete="off"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>
      <input type="hidden" id="files_deleted" name="files_deleted">
      @include('partial.form._text', [
        'model' => $design,
        'name' => 'youtube',
        'label' => 'Đường dẫn video youtube',
        'hideLable' => true
      ])
      <span id="helpBlock" class="help-block">
      *Xem thêm hướng dẫn cách đưa video lên youtube
    </span>
    @include('partial.form._textarea', ['model' => $design, 'name' => 'description', 'label' => 'Giới thiệu', 'rows' => 8])

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
      <button type="button" class="btn btn-warning btn-block form-back3"><span class="fa fa-arrow-left"></span> Quay lại</button>
    </div>
  </fieldset>
</div>