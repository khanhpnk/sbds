<article class="col-md-{{ $col }}">
	<div class="thumb-item">
		<figure>
			<a href="{{ UrlHelper::show($isSale, ['slug' => $model->slug]) }}" title="{{ $model->title }}">
				<img class="thumb-img" width="{{ $iw }}" height="{{ $ih }}" src="{{ ImageHelper::image($model->images, 'house', 'medium') }}" alt="{{ $model->title }}">
			</a>
		</figure>
		<div class="thumb-cap">
			<header>
				<h3 class="thumb-header">
			  	<span class="thumb-type">Cho thuê</span> <a href="{{ UrlHelper::show($isSale, ['slug' => $model->slug]) }}">{{ $model->title }}</a>
				</h3>
			</header>
			{{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
			<address class="thumb-address">
				{{ $model->address }},
				<a href="{{ UrlHelper::all($isSale, ['city' 				=> str_slug($location['city']),
																							'cityId' 			=> $model->city,
																							'district' 		=> str_slug($location['district']),
																							'districtId' 	=> $model->district,
																							'ward' 				=> str_slug($location['ward']),
																							'wardId' 			=> $model->ward]) }}">
					{{ $location['ward'] }}
				</a>
				<a href="{{ UrlHelper::all($isSale, ['city' 				=> str_slug($location['city']),
																							'cityId' 			=> $model->city,
																							'district' 		=> str_slug($location['district']),
																							'districtId' 	=> $model->district]) }}">
					{{ $location['district'] }}
				</a>
				<a href="{{ UrlHelper::all($isSale, ['city' => str_slug($location['city']), 'cityId' => $model->city]) }}">
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
	</div>
</article>