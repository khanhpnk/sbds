<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ UrlHelper::show(ResourceOption::DU_AN, $model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 206 }}" height="{{ $iw or 150 }}" src="{{ ImageHelper::avatar(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <span class="thumb-type">Dự án</span>
          <a href="{{ UrlHelper::show(ResourceOption::DU_AN, $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      {{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
      <address class="thumb-address">
        {{ $model->address }}
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city,
                      'district' => str_slug($location['district']),
                      'districtId' => $model->district,
                      'ward' => str_slug($location['ward']),
                      'wardId' => $model->ward]) }}">
          {{ $location['ward'] }}
        </a>,
        <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                      'city' => str_slug($location['city']),
                      'cityId' => $model->city,
                      'district' => str_slug($location['district']),
                      'districtId' => $model->district]) }}">
          {{ $location['district'] }}
        </a>,
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

    <a class="btn btn-view btn-primary" href="{{ UrlHelper::show(ResourceOption::DU_AN, ['slug' => $model->slug]) }}" target="_blank" role="button">Xem</a>
    <a class="btn btn-edit btn-primary" href="{{ UrlHelper::edit(ConstHelper::URI_DU_AN, ['slug' => $model->slug]) }}" role="button">Sửa</a>
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ UrlHelper::destroy(ConstHelper::URI_DU_AN, ['slug' => $model->slug]) }}" class="form-delete" method="POST" role="form">
    <input type="hidden" name="_method" value="DELETE">
    {!! csrf_field() !!}
    <button class="btn btn-delete btn-primary" type="submit" role="button">Xóa</button>
    </form>
  </div>
</article>