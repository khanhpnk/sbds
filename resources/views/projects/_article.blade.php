<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ route('project.show', $model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 200 }}" height="{{ $iw or 150 }}" src="{{ ImageHelper::avatar(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <span class="thumb-type">Dự án</span>
          <a href="{{ route('project.show', $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      {{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
      <address class="thumb-address">
        {{ $model->address }},
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city,
                      'district' => str_slug($location['district']),
                      'districtId' => $model->district,
                      'ward' => str_slug($location['ward']),
                      'wardId' => $model->ward]) }}">
          {{ $location['ward'] }}
        </a>
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city,
                      'district' => str_slug($location['district']),
                      'districtId' => $model->district]) }}">
          {{ $location['district'] }}
        </a>
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city]) }}">
          {{ $location['city'] }}
        </a>
      </address>
    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">{{ $model->start_date }}</div>
    </footer>
  </div>
</article>