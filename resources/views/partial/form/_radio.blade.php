<div class="radio">
  <label>
    <input type="radio" name="{{ $name }}" value="{{ $value }}" @if (isset($model) && $model->$name == $value) checked @endif autocomplete="off">
    {{ $label }}
  </label>
</div>