<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item">
    <figure>
      <a href="{{ UrlHelper::show(ResourceOption::NHA_DAT, ['slug' => $model->slug]) }}" title="{{ $model->title }}">
        <img class="thumb-img" width="{{ $iw or 200 }}" height="150" src="{{ ImageHelper::avatar(ResourceOption::NHA_DAT, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-cap">
      <header>
        <h3 class="thumb-header">
          <span class="thumb-type">{{ IsSaleOption::getLabel($model->is_sale) }}</span>
          <a href="{{ UrlHelper::show(ResourceOption::NHA_DAT, ['slug' => $model->slug]) }}">{{ $model->title }}</a>
        </h3>
      </header>
      {{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
      <address class="thumb-address">
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
      <div class="clearfix">
        <div class="pull-left">
          <i class="fa fa-building-o"></i>{{ $model->floors }}
          <i class="fa fa-bed "></i>{{ $model->bedroom }}
        </div>
        <div class="thumb-m2">{{ $model->m2 }}m2</div>
      </div>
    </div>
    <footer class="thumb-footer clearfix">
      <span class="thumb-price">{{ MoneyHelper::price($model->price, $model->money_unit, $model->is_sale) }}</span>
      <span class="thumb-date"><time>{{ $model->start_date }}</time></span>
    </footer>

    <a class="btn btn-view btn-primary" href="{{ UrlHelper::show(ResourceOption::NHA_DAT, ['slug' => $model->slug]) }}" target="_blank" role="button">Xem</a>

    @if (IsOwnerOption::CHINH_CHU == $model->is_owner)
      <a class="btn btn-edit btn-primary" href="{{ UrlHelper::edit(ConstHelper::URI_CHINH_CHU, ['id' => $model->id]) }}" role="button">Sửa</a>
      <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ UrlHelper::destroy(ConstHelper::URI_CHINH_CHU, ['id' => $model->id]) }}" class="form-delete" method="POST" role="form">
          <input type="hidden" name="_method" value="DELETE">
          {!! csrf_field() !!}
          <button class="btn btn-delete btn-primary" type="submit" role="button">Xóa</button>
      </form>
    @elseif (IsOwnerOption::MOI_GIOI == $model->is_owner)
      <a class="btn btn-edit btn-primary" href="{{ UrlHelper::edit(ConstHelper::URI_MOI_GIOI, ['id' => $model->id]) }}" role="button">Sửa</a>
      <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ UrlHelper::destroy(ConstHelper::URI_MOI_GIOI, ['id' => $model->id]) }}" class="form-delete" method="POST" role="form">
          <input type="hidden" name="_method" value="DELETE">
          {!! csrf_field() !!}
          <button class="btn btn-delete btn-primary" type="submit" role="button">Xóa</button>
      </form>
    @endif
  </div>
</article>