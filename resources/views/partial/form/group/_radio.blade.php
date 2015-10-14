<label class="btn btn-primary
  @if ( (!is_null($model) && $value == $model->$name)
      || (is_null($model) && isset($default)) )
        active
  @endif">
  <input type="radio" name="{{ $name }}" value="{{ $value }}" autocomplete="off"
    @if ( (!is_null($model) && $value == $model->$name)
        || (is_null($model) && isset($default)) )
          checked
    @endif
  > {{ $label }}
</label>