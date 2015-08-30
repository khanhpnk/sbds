<section class="house">
	<header><h1 class="house-title header-msg">Tin nổi bật</h1></header>

	<div class="house-content">
		@for ($j = 0; $j < 2; $j++)
			<article class="col-md-6 col-sm-6">
				<div class="house-thumb border-right-msg">
					<div class="house-thumb-cap house-bg-bf">
						<header><h2 class="house-thumb-title"><a href="#">Căn hộ chung cư cao cấp sông hồng pack view</a></h2></header>
						<address class="house-thumb-address">phú mỹ hưng, quận hai bà trưng, đường duy tân, hồ chí minh</address>
					</div>
					<figure>
						<a href="#">
							<img width="401" height="200" src="{{ UserHelper::avatar() }}">
						</a>
					</figure>
					<div class="house-thumb-cap">
						<p>Beautiful, updated, ground level Co-op apartment in the desirable Bay Terrace neighborhood. This home features hardwood floors throughout, brand new bathrooms.</p>
					</div>
				</div>
			</article>
		@endfor

		<a class="btn house-btn-view-more" href="#" role="button">
			<i class="fa fa-plus-square-o"></i> Xem thêm
		</a>
	</div><!-- /.house-content -->
</section>