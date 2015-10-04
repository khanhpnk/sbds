<div class="form-group">
  <label for="{{ $name }}">{{ $label }}</label>
  <textarea
      class="form-control"
      rows="{{ $rows or 8 }}"
      name="{{ $name }}"
      id="{{ $id or $name }}"
      placeholder="{{ $placeholder or $label }}">{{ $model->$name or '' }}</textarea>
</div>