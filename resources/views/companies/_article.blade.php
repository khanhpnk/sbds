<article class="col-md-{{ $col }}">
	<div class="thumb-item">
		<figure>
			<a href="{{ UrlHelper::show(ResourceOption::CONG_TY, ['slug' => $model->slug]) }}" title="{{ $model->title }}">
				<img class="thumb-img" width="{{ $iw }}" height="{{ $ih }}" src="{{ ImageHelper::avatar($model->avatar) }}" alt="{{ $model->title }}">
			</a>
		</figure>
		<div class="thumb-cap">
			<header>
				<h3 class="thumb-header">
			  	<span class="thumb-type">{{ TextHelper::resource(ResourceOption::CONG_TY) }}</span> <a href="{{ UrlHelper::show(ResourceOption::CONG_TY, ['slug' => $model->slug]) }}">{{ $model->title }}</a>
				</h3>
			</header>
		</div>
	</div>
</article>