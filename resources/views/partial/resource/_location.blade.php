{{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
@if (! empty($model->address))
  {{ $model->address }} -
@endif
<a href="/danh-sach-nha-dat?t={{ $model->citySlug }}&q={{ $model->districtSlug }}&h={{ $model->wardSlug }}">
  {{ $model->cityName }}
</a> -
<a href="/danh-sach-nha-dat?t={{ $model->citySlug }}&q={{ $model->districtSlug }}">
  {{ $model->districtName }}
</a> -
<a href="/danh-sach-nha-dat?t={{ $model->citySlug }}">
  {{ $model->wardName }}
</a>