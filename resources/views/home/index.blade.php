@extends('layout')

@section('content')

	@if (0 < count($housesFeatured))
		<section class="list">
			<header><h1 class="thumb-title">Tin nổi bật</h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesFeatured as $house)
						@include('houses._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", ['type' => 'ban']) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($projects))
		<section class="list">
			<header><h1 class="thumb-title">Dự án nổi bật</h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@include('projects._article', ['model' => $project, 'resource' => ResourceOption::DU_AN])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", ['type' => 'cho-thue']) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($housesSale))
		<section class="list">
			<header><h1 class="thumb-title">Nhà đất bán</h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesSale as $house)
						@include('houses._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", ['type' => 'ban']) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($housesRent))
		<section class="list">
			<header><h1 class="thumb-title">Nhà đất cho thuê</h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesRent as $house)
						@include('houses._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", ['type' => 'cho-thue']) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	@if (0 < count($projects))
		<section class="list">
			<header><h1 class="thumb-title">Dự án</h1></header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@include('projects._article', ['model' => $project, 'resource' => ResourceOption::DU_AN])
					@endforeach
				</div>

				<a class="btn btn-main" href="{{ route("house.index", ['type' => 'cho-thue']) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	{{--@include('home._construction_design')--}}
@stop