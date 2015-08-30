<section>
  <header><h2 class="form-title">Tính năng</h2></header>
  <div class="row">
    @for ($i = 0; $i < count(FeatureOption::getOptions());  $i++)
      @if (0 == $i % 6) <div class="col-md-3"> @endif
        <div class="checkbox">
          <label><input type="checkbox"> {{ FeatureOption::getLabel($i) }}</label>
        </div>
      @if (0 == ($i + 1) % 6) </div> @endif
    @endfor
  </div>
</section>