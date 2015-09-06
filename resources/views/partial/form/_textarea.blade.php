<div class="form-group">
  <label class="sr-only">{{ $label }}</label>
  <textarea rows="{{ $rows }}" name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $label }}">{{ $house->$name or '' }}</textarea>
</div>