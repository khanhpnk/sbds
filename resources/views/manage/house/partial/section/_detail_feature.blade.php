<section>
  <header><h2 class="form-title">Chi tiết</h2></header>
  <div class="row">
    <div class="col-md-4">
      @include('partial.form._text',   ['name' => 'acreage', 'label' => 'Diện tích sử dụng (m2)'])
      @include('partial.form._select', ['name' => 'toilet', 'label' => 'Số phòng vệ sinh', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'floors', 'label' => 'Số tầng', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'direction', 'label' => 'Hướng nhà', 'option' => DirectionOption::getOptions()])
    </div>
    <div class="col-md-4">
      @include('partial.form._text',   ['name' => 'road', 'label' => 'Đường trước nhà'])
      @include('partial.form._select', ['name' => 'bedroom', 'label' => 'Số phòng ngủ', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'kitchen', 'label' => 'Bếp', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'living_room', 'label' => 'Phòng khách', 'option' => [1,2,3,4,5,6,7,8,9,10]])
    </div>
    <div class="col-md-4">
      @include('partial.form._select', ['name' => 'common_room', 'label' => 'Phòng sinh hoạt chung', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'balcony', 'label' => 'Ban công', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'logia', 'label' => 'Logia', 'option' => [1,2,3,4,5,6,7,8,9,10]])
      @include('partial.form._select', ['name' => 'legal', 'label' => 'Tình trạng pháp lý', 'option' => LegalOption::getOptions()])
    </div>
  </div>
</section>

<section>
  <header><h2 class="form-title">Tính năng</h2></header>
  <div class="row">
    @for ($i = 0; $i < count(FeatureOption::getOptions());  $i++)
      @if (0 == $i % 6) <div class="col-md-3"> @endif
        <div class="checkbox">
          <label><input name="feature[]" type="checkbox" value="{{ $i }}"> {{ FeatureOption::getLabel($i) }}</label>
        </div>
        @if (0 == ($i + 1) % 6) </div> @endif
    @endfor
  </div>
</section>