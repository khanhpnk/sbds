<div id="form-fieldset1" class="form-fieldset">
  <fieldset>
    <legend>Bước 1/3</legend>

    @include('partial.form._select', [
      'name' => 'category',
      'label' => 'Chọn danh mục thiết kế thi công',
      'options' => [
        '1' => 'Kiến trúc',
        '2' => 'Nội thất',
        '3' => 'Thi công'
      ]
    ])

    <div class="form-group">
      <button type="button" class="btn btn-primary btn-block form-open1">Tiếp theo <span class="fa fa-arrow-right"></span></button>
    </div>
  </fieldset>
</div>