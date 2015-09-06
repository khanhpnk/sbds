<div class="form-group">
  <label class="sr-only">{{ $label }}</label>
  <input type="text" name="{{ $name }}" id="{{ $name }}" data-value="{{ $house->$name or '' }}" class="form-control" placeholder="{{ $label }}">
</div>

<script>
  $(function() {
    var $name = '{{ $name }}';
    $('#'+$name).pickadate({
      format: 'dd/mm/yyyy',
      formatSubmit: 'yyyy-mm-dd',
      hiddenName: true,
      min: true, // today
      max: +31, // relative to today
    });
  });
</script>