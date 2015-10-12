<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item">
    <figure>
      <a href="{{ route('front.design.show', ['slug' => $model->slug]) }}" title="{{ $model->title }}">
        <img class="thumb-img" width="{{ $iw or 200 }}" height="150" src="{{ ImageHelper::avatar(ResourceOption::THIET_KE, 1, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-cap">
      <header>
        <h3 class="thumb-header">
          <a href="{{ route('front.design.show', ['slug' => $model->slug]) }}">{{ $model->title }}</a>
        </h3>
      </header>
      {{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
      <address class="thumb-address">
        {{ $model->address }},
        <a href="{{ UrlHelper::index($resource, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city,
                      'district' => str_slug($location['district']),
                      'districtId' => $model->district,
                      'ward' => str_slug($location['ward']),
                      'wardId' => $model->ward]) }}">
          {{ $location['ward'] }}
        </a>
        <a href="{{ UrlHelper::index($resource, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city,
                      'district' => str_slug($location['district']),
                      'districtId' => $model->district]) }}">
          {{ $location['district'] }}
        </a>
        <a href="{{ UrlHelper::index($resource, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city]) }}">
          {{ $location['city'] }}
        </a>
      </address>
      <div class="clearfix">
        <div class="pull-left">
          <i class="fa fa-building-o"></i>{{ $model->number_of_floors }}
        </div>
        <div class="thumb-m2">{{ $model->land_m2 }}m2</div>
      </div>
    </div>
  </div>
</article>