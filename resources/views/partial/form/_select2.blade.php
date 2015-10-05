<div class="form-group">
  <label class="sr-only" for="{{ $name }}">{{ $label }}</label>
  <select id="{{ $name }}" name="{{ $name }}" class="form-control" lang="vi" style="width: 100%" autocomplete="off">
    <option value="">{{ $label }}</option>
    @if(isset($options))
      @foreach ($options as $key => $val)
        <option value="{{ $key }}" @if (isset($value) && $value === $key) selected="selected" @endif >{{ $val }}</option>
      @endforeach
    @endif
  </select>
</div>

<script>
$(function() {
  var $name = '{{ $name }}';
  var $label = '{!! $label !!}';
  $('#'+$name).select2({
    minimumResultsForSearch: Infinity,
    allowClear: true,
    placeholder: $label
  });
});
</script>