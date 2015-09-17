@extends('layout')

@section('content')
	<article class="article">
		<header><h1 class="article-title">{{ $house->title }}</h1></header>
		<div class="row">
			<div class="col-md-9">
				<address class="article-address">
					Địa chỉ:
					<a href="#">16 Phú mỹ hưng</a>,
					<a href="#">Lâm tiến</a>,
					<a href="#">Hai bà trưng</a>,
					<a href="#">Hồ chí minh</a>
				</address>
			</div>
			<div class="col-md-3">
				<div class="article-fb-like">
					<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="article-price">{{ MoneyHelper::price($house->price, $house->money_unit, $house->is_sale) }}</div>
			</div>
			<div class="col-md-2">
				<div class="article-code">N{{ $house->id }}</div>
			</div>
			<div class="col-md-2">
				<div class="article-date"><time>{{ $house->start_date }}</time></div>
			</div>
		</div>

		@include('houses._gallery')

		<section class="article-description">
			{!! nl2br($house->description) !!}
		</section>

		<section>
			<header><h3 class="article-section-title">Chi tiết</h3></header>
			<ul class="row article-section-content">
				<li class="col-md-4">Diện tích sử dụng: {{ $house->m2 }} (m2)</li>
				<li class="col-md-4">Đường trước nhà: {{ $house->road }}</li>
				@if (0 != $house->common_room)
					<li class="col-md-4">Phòng sinh hoạt chung: {{ $house->common_room }}</li>
				@endif
				@if (0 != $house->toilet)
					<li class="col-md-4">Số phòng vệ sinh: {{ $house->toilet }}</li>
				@endif
				@if (0 != $house->bedroom)
					<li class="col-md-4">Số phòng ngủ: {{ $house->bedroom }}</li>
				@endif
				@if (0 != $house->balcony)
					<li class="col-md-4">Ban công: {{ $house->balcony }}</li>
				@endif
				@if (0 != $house->floors)
					<li class="col-md-4">Số tầng: {{ $house->floors }}</li>
				@endif
				@if (0 != $house->kitchen)
					<li class="col-md-4">Bếp: {{ $house->kitchen }}</li>
				@endif
				@if (0 != $house->logia)
					<li class="col-md-4">Logia: {{ $house->logia }}</li>
				@endif
				@if (0 != $house->direction)
					<li class="col-md-4">Hướng nhà: {{ HouseDirectionOption::getLabel($house->direction) }}</li>
				@endif
				@if (0 != $house->living_room)
					<li class="col-md-4">Phòng khách: {{ $house->living_room }}</li>
				@endif
				@if (0 != $house->license)
					<li class="col-md-4">Tình trạng pháp lý: {{ HouseLicenseOption::getLabel($house->license) }}</li>
				@endif
			</ul>
		</section>

		<section class="feature">
			<header><h3 class="article-section-title">Tính năng</h3></header>
			<ul class="row article-section-content">
				@foreach(HouseFeatureOption::getOptions() as $feature => $label)
					<li class="col-md-3 @if(in_array($feature, $house->feature)) selected @endif">
						<span aria-hidden="true" class="glyphicon glyphicon-ok"></span>{{ $label }}
					</li>
				@endforeach
			</ul>
		</section>

		<div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="2"></div>

		<section class="relation">
			<header><h3 class="article-section-title">Nhà đất tương tụ</h3></header>
		</section>


	</article>
@stop
