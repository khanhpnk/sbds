<div class="form-group">
  <label for="{{ $id or $name }}">{{ $label }}</label>
  <select class="form-control" name="{{ $name }}" id="{{ $id or $name }}">
    @if(isset($options))
      @foreach ($options as $key => $val)
        <option value="{{ $key }}">
          {{ $val }}
        </option>
      @endforeach
    @endif
  </select>
</div>