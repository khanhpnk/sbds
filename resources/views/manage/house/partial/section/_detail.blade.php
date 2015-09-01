<section>
  <header><h2 class="form-title">Chi tiết</h2></header>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label class="sr-only">Diện tích sử dụng (m2)</label>
        <input type="text" name="acreage" class="form-control" placeholder="Diện tích sử dụng (m2)">
      </div>
      @include('manage.house.partial.form._select', ['name' => 'toilet', 'label' => 'Số phòng vệ sinh'])
      @include('manage.house.partial.form._select', ['name' => 'floors', 'label' => 'Số tầng'])
      <div class="form-group">
        <label class="sr-only">Hướng nhà</label>
        <select name="" class="form-control">
          <option value="">Hướng nhà</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="sr-only">Đường trước nhà</label>
        <input type="text" name="" class="form-control" value="" placeholder="Đường trước nhà">
      </div>
      @include('manage.house.partial.form._select', ['name' => 'bedroom', 'label' => 'Số phòng ngủ'])
      @include('manage.house.partial.form._select', ['name' => 'kitchen', 'label' => 'Bếp'])
      @include('manage.house.partial.form._select', ['name' => 'living_room', 'label' => 'Phòng khách'])
    </div>
    <div class="col-md-4">
      @include('manage.house.partial.form._select', ['name' => 'common_room', 'label' => 'Phòng sinh hoạt chung'])
      @include('manage.house.partial.form._select', ['name' => 'balcony', 'label' => 'Ban công'])
      @include('manage.house.partial.form._select', ['name' => 'logia', 'label' => 'Logia'])
      <div class="form-group">
        <label class="sr-only">Tình trạng pháp lý</label>
        <select id="legal" name="legal" class="form-control">
          <option value="">Tình trạng pháp lý</option>
          @foreach (LegalOption::getOptions() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</section>