<div class="form-group">
  <label for="{{ $name }}">{{ $label }}</label>
  <textarea rows="{{ $rows }}" name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $label }}">{{ $model->$name or '' }}</textarea>
</div>