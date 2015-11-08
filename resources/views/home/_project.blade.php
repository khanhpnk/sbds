<article class="col-md-6">
  <div class="thumb-item-ds">
    <div class="thumb-content-big">
      <header>
        <h3 class="thumb-header-big">
          <span class="thumb-type">Dự án</span>
          <a href="{{ UrlHelper::show(ResourceOption::DU_AN, $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      {{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
      <address class="thumb-address-big">
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
    <figure>
      <a class="thumb-img-ds" href="{{ UrlHelper::show(ResourceOption::DU_AN, $model->slug) }}" title="{{ $model->title }}">
        <img width="433" height="290" src="{{ ImageHelper::avatar(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-more-content-big">
      {!! nl2br(str_limit($model->description, 200)) !!}
    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">{{ $model->start_date }}</div>
    </footer>
  </div>
</article>