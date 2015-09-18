<article class="col-md-{{ $col }}">
	<div class="thumb-caption">{{ $caption }}</div>
	<div class="thumb-item">
		<figure>
			<a href="{{ route('house.show') }}"><img class="thumb-img" width="{{ $imgWidth }}" height="150" src="http://localhost:8000/images/uploads/house/1.041630.17092015.0.jpg"></a>
		</figure>
		<div class="thumb-cap">
			<header><h3 class="thumb-title"><span class="thumb-type">Cho thuê</span> <a href="#">{{ $house->title }}</a></h3></header>
			<address class="thumb-address"><a href="#">16 Phú mỹ hưng</a>, <a href="#">Lâm tiến</a>, <a href="#">Hai bà trưng</a>, <a href="#">Hồ chí minh</a></address>
			<div class="clearfix">
				<div class="pull-left">
					<i class="fa fa-bed "></i>2
					<i class="fa fa-user"></i>400
				</div>
				<div class="thumb-m2">{{ $house->m2 }}m2</div>
			</div>
		</div>
		<footer class="thumb-footer clearfix">
			<span class="thumb-price">{{ MoneyHelper::price($house->price, $house->money_unit, $house->is_sale) }}</span>
			<span class="thumb-date"><time>{{ $house->start_date }}</time></span>
		</footer>
	</div>
</article>