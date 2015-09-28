<div class="form-group">
  <label class="col-sm-3 control-label" for="{{ $name }}">{{ $label }}</label>
  <div class="col-sm-9">
    <select id="{{ $name }}" name="{{ $name }}" class="form-control" lang="vi" style="width: 100%" autocomplete="off">
      <option value="">{{ $label }}</option>
      @foreach ($options as $key => $val)
        <option value="{{ $key }}" @if ($value === $key) selected="selected" @endif >{{ $val }}</option>
      @endforeach
    </select>
  </div>
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