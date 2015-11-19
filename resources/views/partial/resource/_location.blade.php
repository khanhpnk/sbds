{{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
@if (! empty($model->address))
  {{ $model->address }} -
@endif
<a href="/danh-sach-nha-dat?t={{ $model->city }}&q={{ $model->city }}&h={{ $model->ward }}">
  {{ $location['ward'] }}
</a> -
<a href="/danh-sach-nha-dat?t={{ $model->city }}&q={{ $model->city }}">
  {{ $location['district'] }}
</a> -
<a href="/danh-sach-nha-dat?t={{ $model->city }}">
  {{ $location['city'] }}
</a>