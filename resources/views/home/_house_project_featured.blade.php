<section>
	<header><h1 class="house-title">Dự án nổi bật</h1></header>

	<div class="house-content clearfix">
		@for ($j = 0; $j < 2; $j++)
			<article class="col-md-6 col-sm-6">
				<div class="house-thumb house-br">
					<div class="house-thumb-cap house-bg-bf">
						<header><h3 class="house-thumb-title"><span class="house-thumb-type">Dự án</span> <a href="#">Căn hộ chung cư cao cấp sông hồng pack view</a></h3></header>
						<address class="house-thumb-address"><a href="#">16 Phú mỹ hưng</a>, <a href="#">Lâm tiến</a>, <a href="#">Hai bà trưng</a>, <a href="#">Hồ chí minh</a></address>
					</div>
					<figure>
						<a href="#">
							<img class="house-thumb-img" width="411" height="200" src="{{ UserHelper::avatar() }}">
						</a>
					</figure>
					<div class="house-thumb-cap">
						<p>Beautiful, updated, ground level Co-op apartment in the desirable Bay Terrace neighborhood. This home features hardwood floors throughout, brand new bathrooms.</p>
					</div>
				</div>
			</article>
		@endfor

		<a class="btn btn-main" href="#" role="button">
			<i class="fa fa-plus-square-o"></i> Xem thêm
		</a>
	</div><!-- /.house-content -->
</section>