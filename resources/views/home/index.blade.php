@extends('one_col_layout')

@section('content')
	@if (0 < count($housesFeatured))
		<section>
			<header><h1 class="thumb-title"><a href="/tin-noi-bat">Tin nổi bật</a></h1></header>
			<div class="thumb thumb-br-default thumb-home clearfix">
				<div class="row">
					@foreach ($housesFeatured as $house)
						@include('partial.resource.house._item_large', ['model' => $house])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($housesNew))
		<section>
			<header><h1 class="thumb-title"><a href="/tin-moi">Tin mới</a></h1></header>
			<div class="thumb thumb-br-default thumb-home clearfix">
				<div class="row">
					@foreach ($housesNew as $house)
						@include('partial.resource.house._item', ['model' => $house, 'col' => 3])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($projectsFeatured))
		<section>
			<header><h1 class="thumb-title"><a href="/du-an-noi-bat">Dự án nổi bật</a></h1></header>
			<div class="thumb thumb-br-default thumb-home clearfix">
				<div class="row">
					@foreach ($projectsFeatured as $project)
						@include('partial.resource.project._item_large', ['model' => $project])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($housesSale))
		<section>
			<header><h1 class="thumb-title"><a href="/danh-sach-nha-dat?type=ban">Nhà đất bán</a></h1></header>
			<div class="thumb thumb-br-default thumb-home clearfix">
				<div class="row">
					@foreach ($housesSale as $house)
						@include('partial.resource.house._item', ['model' => $house, 'col' => 3])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($housesRent))
		<section>
			<header><h1 class="thumb-title"><a href="/danh-sach-nha-dat?type=cho-thue">Nhà đất cho thuê</a></h1></header>
			<div class="thumb thumb-br-default thumb-home clearfix">
				<div class="row">
					@foreach ($housesRent as $house)
						@include('partial.resource.house._item', ['model' => $house, 'col' => 3])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($projects))
		<section>
			<header><h1 class="thumb-title"><a href="/du-an">Dự án</a></h1></header>
			<div class="thumb thumb-br-default thumb-home clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@include('partial.resource.project._item', ['model' => $project, 'col' => 3])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	<section>
		<header><h1 class="thumb-title">Dịch vụ thiết kế thi công</h1></header>
		<div class="thumb thumb-br-default thumb-home clearfix">
			<div class="row">
				@include('front.designs._static', [
					'title' => 'Dịch vụ thiết kế nhà', 
					'url' => 'dich-vu-thiet-ke-nha',
					'img' => 'thiet-ke-nha.jpg'])
				@include('front.designs._static', [
					'title' => 'Dịch vụ thiết kế nội thất', 
					'url' => 'dich-vu-thiet-ke-noi-that',
					'img' => 'thiet-ke-noi-that.jpg'])
				@include('front.designs._static', [
					'title' => 'Dịch vụ xây và sửa nhà', 
					'url' => 'dich-vu-xay-va-sua-nha',
					'img' => 'xay-sua-nha.jpg'])
				@include('front.designs._static', [
					'title' => 'Báo giá thiết kế', 
					'url' => 'bao-gia-thiet-ke',
					'img' => 'bao-gia.jpg'])
			</div>
		</div>
	</section>
@stop