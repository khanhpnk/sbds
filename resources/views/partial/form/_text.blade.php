<div class="form-group">
  <label class="sr-only" for="{{ $name }}">{{ $label }}</label>
  <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $model->$name or '' }}" class="form-control" placeholder="{{ $label }}">
</div>