<div class="form-group">
  <label for="{{ $id or $name }}">{{ $label }}</label>
  <textarea class="form-control" name="{{ $name }}" id="{{ $id or $name }}" placeholder="{{ $placeholder or $label }}" rows="{{ $rows or 8 }}">
{{ $model->$name or '' }}
  </textarea>
</div>