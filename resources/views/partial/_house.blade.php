<figure>
	<a href="{{ UrlHelper::show($resource, $model->slug) }}" title="{{ $model->title }}">
		<img class="thumb-img" width="{{ $iw }}" height="{{ $ih }}" src="{{ ImageHelper::image($model->images, $model->user_id, 'house', 'medium') }}" alt="{{ $model->title }}">
	</a>
</figure>
<div class="thumb-cap">
	<header>
		<h3 class="thumb-header">
			{{--<span class="thumb-type">{{ TextHelper::resource($resource) }}</span> --}}
			<a href="{{ UrlHelper::show($resource, $model->slug) }}">{{ $model->title }}</a>
		</h3>
	</header>
	 */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /*
	<address class="thumb-address">
		{{ $model->address }},
		<a href="{{ UrlHelper::all($resource, ['city' => str_slug($location['city']),
													'cityId' => $model->city,
													'district' => str_slug($location['district']),
													'districtId' => $model->district,
													'ward' => str_slug($location['ward']),
													'wardId' => $model->ward]) }}">
			{{ $location['ward'] }}
		</a>
		<a href="{{ UrlHelper::all($resource, ['city' => str_slug($location['city']),
													'cityId' => $model->city,
													'district' => str_slug($location['district']),
													'districtId' => $model->district]) }}">
			{{ $location['district'] }}
		</a>
		<a href="{{ UrlHelper::all($resource, ['city' => str_slug($location['city']), 'cityId' => $model->city]) }}">
			{{ $location['city'] }}
		</a>
	</address>
	@if (ResourceOption::DU_AN != $resource)
		<div class="clearfix">
			<div class="pull-left">
				<i class="fa fa-building-o"></i>{{ $model->floors }}
				<i class="fa fa-bed "></i>{{ $model->bedroom }}
			</div>
			<div class="thumb-m2">{{ $model->m2 }}m2</div>
		</div>
	@endif
</div>
<footer class="thumb-footer clearfix">
	@if (ResourceOption::DU_AN != $resource)
		<span class="thumb-price">{{ MoneyHelper::price($model->price, $model->money_unit, $model->is_sale) }}</span>
	@endif
	<span class="thumb-date"><time>{{ $model->start_date }}</time></span>
</footer>