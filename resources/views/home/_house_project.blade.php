<section>
	<header><h1 class="house-title">Dự án</h1></header>

	<div class="house-content house-br clearfix">
		@for ($j = 0; $j < 4; $j++)
			<article class="col-md-3 col-sm-6">
				<div class="house-thumb">
					<figure>
						<a href="#">
							<img class="house-thumb-img" width="196" height="200" src="{{ UserHelper::avatar() }}">
						</a>
					</figure>
					<div class="house-thumb-cap">
						<header><h3 class="house-thumb-title"><span class="house-thumb-type">Dự án</span> <a href="#">căn hộ chung cư cao cấp sông hồng</a></h3></header>
						<address class="house-thumb-address"><a href="#">16 Phú mỹ hưng</a>, <a href="#">Lâm tiến</a>, <a href="#">Hai bà trưng</a>, <a href="#">Hồ chí minh</a></address>
						<p><i class="fa fa-bed"></i>2 <i class="fa fa-building-o"></i>300m2 <i class="fa fa-user"></i>400 </p>
					</div>
					<footer class="house-thumb-footer clearfix">
						<span class="house-thumb-date"><time>18/7/2015</time></span>
					</footer>
				</div>
			</article>
		@endfor

		<a class="btn btn-main" href="#" role="button">
			<i class="fa fa-plus-square-o"></i> Xem thêm
		</a>
	</div><!-- /.house-content -->
</section>