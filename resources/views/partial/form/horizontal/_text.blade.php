<div class="form-group">
  <label class="col-sm-3 control-label" for="{{ $name }}">{{ $label }}</label>
  <div class="col-sm-9">
    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $model->$name or '' }}" class="form-control" placeholder="{{ $label }}">
  </div>
</div>