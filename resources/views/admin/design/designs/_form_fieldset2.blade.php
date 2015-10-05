<div id="form-fieldset2" class="form-fieldset" style="display: none;">
  <fieldset>
    <legend>Bước 2/3</legend>

    @include('partial.form._select', [
      'name' => 'sub_category',
      'label' => 'Chọn kiểu thiết kế thi công'
    ])

    <div class="form-group">
      <button type="button" class="btn btn-primary btn-block form-open2">Tiếp theo <span class="fa fa-arrow-right"></span></button>
      <button type="button" class="btn btn-warning btn-block form-back2"><span class="fa fa-arrow-left"></span> Quay lại</button>
    </div>
  </fieldset>
</div>