<div class="form-group">
  <label @if (isset($hideLable)) class="sr-only" @endif for="{{ $id or $name }}">
    {{ $label }}
  </label>
  <input  type="text" class="form-control" name="{{ $name }}" id="{{ $id or $name }}" value="{{ $model->$name or '' }}" placeholder="{{ $placeholder or $label }}">
</div>