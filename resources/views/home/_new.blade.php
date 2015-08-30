<section class="house">
	<header><h1 class="house-title header-msg">Tin mới</h1></header>

	<div class="house-content border-right-msg">
		@for ($j = 0; $j < 4; $j++)
			<article class="col-md-3 col-sm-6">
				<div class="house-thumb">
					<figure>
						<a href="#">
							<img alt="100%x200" data-src="holder.js/100%x200" style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRmNjdlMDQ1NmUgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGY2N2UwNDU2ZSI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTAwMDAzODE0Njk3MyIgeT0iMTA1LjciPjI0MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
						</a>
					</figure>
					<div class="house-thumb-cap">
						<header><h2 class="house-thumb-title"><a href="#">Căn hộ chung cư cao cấp sông hồng pack view</a></h2></header>
						<address class="house-thumb-address">phú mỹ hưng, quận hai bà trưng, đường duy tân, hồ chí minh</address>
						<p><i class="fa fa-bed"></i>2<i class="fa fa-building-o"></i>300m2<i class="fa fa-user"></i>400</p>
					</div>
					<footer class="house-thumb-footer clearfix">
						<span class="house-thumb-price color-msg"><strong>900 VNĐ</strong></span>
						<span class="house-thumb-date"><time>18/7/2015</time></span>
					</footer>
				</div>
			</article>
		@endfor

		<a class="btn house-btn-view-more" href="#" role="button">
			<i class="fa fa-plus-square-o"></i> Xem thêm
		</a>
	</div><!-- /.house-content -->
</section>