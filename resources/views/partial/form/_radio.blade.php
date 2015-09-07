<div class="radio">
  <label>
    <input type="radio" name="{{ $name }}" value="{{ $value }}" @if(true == $checked) checked @endif autocomplete="off">
    {{ $label }}
  </label>
</div>