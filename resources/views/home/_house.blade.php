<article class="col-md-6">
  <div class="thumb-item">
    <figure>
      <a href="{{ UrlHelper::show(ResourceOption::NHA_DAT, ['slug' => $model->slug]) }}" title="{{ $model->title }}">
        <img class="thumb-img" width="433" height="290" src="{{ ImageHelper::avatar(ResourceOption::NHA_DAT, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-big">
      <header>
        <h3 class="thumb-header-big">
          <span class="thumb-type">{{ IsSaleOption::getLabel($model->is_sale) }}</span>
          <a href="{{ UrlHelper::show(ResourceOption::NHA_DAT, ['slug' => $model->slug]) }}">{{ $model->title }}</a>
        </h3>
      </header>
      {{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
      <address class="thumb-address-big">
        {{ $model->address }},
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                        'type' => IsSaleUriOption::getLabel($model->is_sale),
                        'city' => str_slug($location['city']),
                        'cityId' => $model->city,
                        'district' => str_slug($location['district']),
                        'districtId' => $model->district,
                        'ward' => str_slug($location['ward']),
                        'wardId' => $model->ward]) }}">
          {{ $location['ward'] }}
        </a>,
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                        'type' => IsSaleUriOption::getLabel($model->is_sale),
                        'city' => str_slug($location['city']),
                        'cityId' => $model->city,
                        'district' => str_slug($location['district']),
                        'districtId' => $model->district]) }}">
          {{ $location['district'] }}
        </a>,
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                        'type' => IsSaleUriOption::getLabel($model->is_sale),
                        'city' => str_slug($location['city']),
                        'cityId' => $model->city]) }}">
          {{ $location['city'] }}
        </a>
      </address>
      <div class="thumb-icon-big clearfix">
        <div class="pull-left">
          <i class="fa fa-building-o"></i>{{ $model->floors }}
          <i class="fa fa-bed "></i>{{ $model->bedroom }}
        </div>
        <div class="thumb-m2 pull-right">{{ $model->m2 }}m2</div>
      </div>
    </div>
    <footer class="thumb-footer clearfix">
      <span class="thumb-price">{{ MoneyHelper::price($model->price, $model->money_unit, $model->is_sale) }}</span>
      <div class="thumb-date pull-right"><time>{{ $model->start_date }}</time></div>
    </footer>
  </div>
</article>