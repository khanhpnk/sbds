<section>
	<header>
		<h1 class="house-title">{{ $title }}</h1>
		<nav class="simple-pagination">{!! $houses->render() !!}</nav>
	</header>

	<div class="house-content house-br clearfix">
		@for ($j = 0; $j < 4; $j++)
			{{--@include('partial._article')--}}
		@endfor

		<a class="btn btn-main" href="{{ $viewMoreRoute }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
	</div><!-- /.house-content -->
</section>