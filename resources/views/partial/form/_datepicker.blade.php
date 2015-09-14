<div class="form-group">
  <label class="sr-only" for="{{ $name }}">{{ $label }}</label>
  <input type="text" name="{{ $name }}" id="{{ $name }}" data-value="{{ $model->$name or '' }}" class="form-control" placeholder="{{ $label }}">
</div>

<script>
  $(function() {
    // private for start_date & end_date
    var name = "{{ $name }}";
    var date = $("#"+name).data("value");

    $("#"+name).pickadate({
      format: 'dd/mm/yyyy',
      formatSubmit: 'yyyy-mm-dd',
      hiddenName: true,
      clear: '',
      min: true, // today
      max: +31, // relative to today
      onStart: function() {
        if ("" == date) {
          var now = new Date();
          var month = ('start_date' == name) ? now.getMonth() : now.getMonth() + 1;

          this.set('select', [now.getFullYear(), month, now.getDate()]);
        }
      }
    });
  });
</script>