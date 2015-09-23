<article class="col-md-{{ $col }}">
	<div class="thumb-item">
		<figure>
			@if (IsSaleOption::BAN == $isSale)
				{{-- */ $url = route('house.saleShow', ['slug' => $model->slug]) /* --}}
			@elseif(IsSaleOption::CHO_THUE == $isSale)
				{{-- */ $url = route('house.rentShow', ['slug' => $model->slug]) /* --}}
			@endif
			<a href="{{ $url }}" title="{{ $model->title }}">
				<img class="thumb-img" width="{{ $iw }}" height="{{ $ih }}" src="{{ ImageHelper::image($model->images, 'house', 'medium') }}" alt="{{ $model->title }}">
			</a>
		</figure>
		<div class="thumb-cap">
			<header>
				<h3 class="thumb-title">
			  	<span class="thumb-type">Cho thuê</span> <a href="{{ $url }}">{{ $model->title }}</a>
				</h3>
			</header>
			{{-- */ $location = LocationHelper::full($model->city, $model->district, $model->ward) /* --}}
			<address class="thumb-address">
				{{ $model->address }},
				<a href="{{ route('house.saleList', ['city' => str_slug($location['city']), 'cityId' => $model->city, 'district' => str_slug($location['district']), 'districtId' => $model->district, 'ward' => str_slug($location['ward']), 'wardId' => $model->ward]) }}">{{ $location['ward'] }}</a>,
				<a href="{{ route('house.saleList', ['city' => str_slug($location['city']), 'cityId' => $model->city, 'district' => str_slug($location['district']), 'districtId' => $model->district]) }}">{{ $location['district'] }}</a>,
				<a href="{{ UrlHelper::all($isSale, ['city' => str_slug($location['city']),
									 	    		 'cityId' => $model->city]) }}">
					{{ $location['city'] }}
				</a>
			</address>
			<div class="clearfix">
				<div class="pull-left">
					<i class="fa fa-bed "></i>2
					<i class="fa fa-user"></i>400
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