{!! csrf_field() !!}

@include('partial.form._text', [
  'model' => $company,
  'name' => 'title',
  'label' => 'Tiêu đề'
])

@include('partial.form._textarea', [
  'model' => $company,
  'name' => 'short_description',
  'label' => 'Giới thiệu ngắn gọn'
])

@include('partial.form._textarea', [
  'model' => $company,
  'name' => 'description',
  'label' => 'Giới thiệu chi tiết'
])

<div class="form-group">
  <button type="submit" class="btn btn-primary btn-block">{{ $submitBtnText }}</button>
</div>

<button type="button" class="btn btn-default" onclick="history.go(-1)">« Back</button>

