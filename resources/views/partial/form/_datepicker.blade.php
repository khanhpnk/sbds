<div class="form-group">
  <label class="sr-only">{{ $label }}</label>
  <input type="text" name="{{ $name }}" id="{{ $name }}" data-value="{{ $house->$name or '' }}" value="" class="form-control" placeholder="{{ $label }}">
</div>

<script>
  $(function() {
    var $name = '{{ $name }}';
    $('#'+$name).pickadate({
      format: 'dd/mm/yyyy',
      formatSubmit: 'yyyy-mm-dd',
      hiddenName: true,
      clear: '',
      min: true, // today
      max: +31, // relative to today
      onStart: function() {
        var date = new Date();
        this.set('select', [date.getFullYear(), date.getMonth() + 1, date.getDate()]);
      }
    });
  });
</script>