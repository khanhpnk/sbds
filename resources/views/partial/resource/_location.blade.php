{{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
<address class="thumb-address-big">
  {{ $model->address }},
  <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                        //'type' => IsSaleUriOption::getLabel($model->is_sale),
                        'city' => str_slug($location['city']),
                        'cityId' => $model->city,
                        'district' => str_slug($location['district']),
                        'districtId' => $model->district,
                        'ward' => str_slug($location['ward']),
                        'wardId' => $model->ward]) }}">
    {{ $location['ward'] }}
  </a>,
  <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                        //'type' => IsSaleUriOption::getLabel($model->is_sale),
                        'city' => str_slug($location['city']),
                        'cityId' => $model->city,
                        'district' => str_slug($location['district']),
                        'districtId' => $model->district]) }}">
    {{ $location['district'] }}
  </a>,
  <a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                        //'type' => IsSaleUriOption::getLabel($model->is_sale),
                        'city' => str_slug($location['city']),
                        'cityId' => $model->city]) }}">
    {{ $location['city'] }}
  </a>
</address>