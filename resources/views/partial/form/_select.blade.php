<div class="form-group">
  <label class="sr-only">{{ $label }}</label>
  <select id="{{ $name }}" name="{{ $name }}" class="form-control" lang="vi" style="width: 100%">
    <option value="">{{ $label }}</option>
    @foreach ($option as $key => $value)
      <option value="{{ $key }}" @if (isset($house) && $house->$name == $key) selected="selected" @endif >{{ $value }}</option>
    @endforeach
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