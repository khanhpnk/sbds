@section('javascript')
  @parent
  <script>
    $(function() {
      @if (isset($project->images))
        imagesModule.setImagesDbJSON({!! json_encode($project->images) !!});
        imagesModule.setImageUrl("{{ ImageHelper::link(config('image.paths.project').'/'.$project->user_id) }}");
      @endif
      projectModule.setCheckUniqueUrl("{{ $checkUniqueUrl }}");
      projectModule.init();
      locationModule.setLocationDbJSON({
        address: "{{ $project->address or '' }}",
        ward: "{{ $project->ward or '' }}",
        district: "{{ $project->district or '' }}",
        city: "{{ $project->city or '' }}"
      });

      mapModule.init("form-map-canvas");

    });
  </script>
  <script src="{{ asset('js/manage/project.js') }}"></script>
@stop

{!! csrf_field() !!}
<section>
  @include('partial.form._text', ['model' => $project, 'name' => 'title', 'label' => 'Tiêu đề'])
  @include('partial.form._textarea', ['model' => $project, 'name' => 'description', 'label' => 'Giới thiệu dự án', 'rows' => 8])
  @include('partial.form._textarea', ['model' => $project, 'name' => 'schedule', 'label' => 'Tiến độ thanh toán dự án', 'rows' => 8])
  @include('partial.form._textarea', ['model' => $project, 'name' => 'location', 'label' => 'Vị trí dự án', 'rows' => 8])
  <div class="row">
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'category',
                                        'label' => 'Loại BĐS',
                                        'options' => ProjectCategoryOption::getOptions(),
                                        'value' => !is_null($project) ? $project->category : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._datepicker', ['model' => $project, 'name' => 'start_date', 'label' => 'Ngày bắt đầu'])
    </div>
    <div class="col-md-4">
      @include('partial.form._datepicker', ['model' => $project, 'name' => 'end_date', 'label' => 'Ngày kết thúc'])
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'city',
                                             'label' => 'Tỉnh thành',
                                             'options' => [],
                                             'value' => !is_null($project) ? $project->city : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'district',
                                             'label' => 'Quận / huyện',
                                             'options' => [],
                                             'value' => !is_null($project) ? $project->district : null])
    </div>
    <div class="col-md-4">
      @include('partial.form._select2', ['name' => 'ward',
                                             'label' => 'Xã / phường',
                                             'options' => [],
                                             'value' => !is_null($project) ? $project->ward : null])
    </div>
  </div>
  @include('partial.form._text', ['model' => $project, 'name' => 'address', 'label' => 'Địa chỉ cụ thể', 'hideLable' => true])

  <div id="form-map-canvas" style="height: 400px; width: 100%;"></div>
  <span id="helpBlock" class="help-block">
    *Trong trường hợp kết quả tìm kiếm không chính xác, nhấn chuột vào biểu tượng và di chuyển đến vị trí nhà đất của bạn.
  </span>
  @include('partial.form._hidden', ['model' => $project, 'name' => 'lat'])
  @include('partial.form._hidden', ['model' => $project, 'name' => 'lng'])

  <a class="btn btn-form-upload" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif" autocomplete="off"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>
  <input type="hidden" id="files_deleted" name="files_deleted">
  @include('partial.form._text', ['model' => $project, 'name' => 'youtube', 'label' => 'Đường dẫn video youtube', 'hideLable' => true])
  <span id="helpBlock" class="help-block">
    *Xem thêm hướng dẫn cách đưa video lên youtube
  </span>
</section>
<button type="submit" class="btn btn-primary btn-block">{{ $submitBtnText }}</button>