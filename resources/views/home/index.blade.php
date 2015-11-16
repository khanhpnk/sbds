@extends('one_col_layout')

@section('content')
	@if (0 < count($housesFeatured))
		<section class="list">
			<header><h1 class="thumb-title">Tin nổi bật</h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesFeatured as $house)
						@include('home._house', ['model' => $house])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", 'ban') }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($housesNew))
		<section class="list">
			<header><h1 class="thumb-title">Tin mới</h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesNew as $house)
						@include('houses._article', ['model' => $house, 'col' => 3, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", 'ban') }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($projectsFeatured))
		<section class="list">
			<header><h1 class="thumb-title"><a href="{{ route('project.index') }}">Dự án nổi bật</a></h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projectsFeatured as $project)
						@include('home._project', ['model' => $project])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("project.index") }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($housesSale))
		<section class="list">
			<header><h1 class="thumb-title"><a href="{{ route('house.index', 'ban') }}">Nhà đất bán</a></h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesSale as $house)
						@include('houses._article', ['model' => $house, 'col' => 3, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", 'ban') }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($housesRent))
		<section class="list">
			<header><h1 class="thumb-title"><a href="{{ route('house.index', 'cho-thue') }}">Nhà đất cho thuê</a></h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesRent as $house)
						@include('houses._article', ['model' => $house, 'col' => 3, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", 'cho-thue') }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($projects))
		<section class="list">
			<header><h1 class="thumb-title"><a href="{{ route('project.index') }}">Dự án</a></h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@include('projects._article', ['model' => $project, 'col' => 3, 'resource' => ResourceOption::DU_AN])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("project.index") }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	<section>
		<div class="thumb thumb-br-default clearfix">
			<div class="row">
				@include('front.designs._static', ['title' => 'Dịch vụ thiết kế nhà', 'img' => 'thiet-ke-nha.jpg'])
				@include('front.designs._static', ['title' => 'Dịch vụ thiết nội thất', 'img' => 'thiet-ke-noi-that.jpg'])
				@include('front.designs._static', ['title' => 'Dịch vụ xây và sửa nhà', 'img' => 'xay-sua-nha.jpg'])
				@include('front.designs._static', ['title' => 'Báo giá', 'img' => 'bao-gia.jpg'])
			</div>
		</div>
	</section>
@stop