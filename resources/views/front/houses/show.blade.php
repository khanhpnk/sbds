@extends('layout')

@section('meta_title'){{ $house->meta_title }}@stop
@section('meta_description'){{ $house->meta_description }}@stop

@section('breadcrumb')
	<li><a href="/danh-sach-nha-dat?type={{ str_slug(saleTypeLabel($house->sale_type)) }}">{{ saleTypeLabel($house->sale_type) }}</a></li>
	<li class="active">{{ $house->title }}</li>
@stop

@section('sidebarHook')
	<nav>
		<ul class="sidebar-pagination">
			@if (is_null($preview))
				<li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">«</span></a></li>
			@else
				<li><a rel="preview" href="{{ houseShowUrl($preview->slug) }}" title="{{ $preview->title }}">«</a></li>
			@endif
			@if (is_null($next))
				<li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">»</span></a></li>
			@else
				<li><a rel="next" href="{{ houseShowUrl($next->slug) }}" title="{{ $next->title }}">»</a></li>
			@endif
		</ul>
	</nav>

	@include('partial.resource._contact')
@stop

@section('style')
	<meta property="og:url"           content="{{ houseShowUrl($house->slug) }}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{ $house->title }}" />
	<meta property="og:description"   content="{{ $house->description }}" />
	<meta property="og:image"         content="{{ ImageHelper::avatar(ResourceOption::NHA_DAT, $model->user_id, $model->images) }}" />
@stop

@section('javascript')
	@parent
@stop

@section('content')

	<article class="article">
		<header><h1 class="article-title">{{ $house->title }}</h1></header>
		<section class="article-head">
			<div class="row">
				<div class="col-md-9">
					<address class="article-head-address">
						Địa chỉ:
						@include('partial.resource._location', ['model' => $house])
					</address>
				</div>
				<div class="col-md-3">
					<div class="article-head-fb-like" style="float: left">
						<div class="fb-like" data-href="{{ houseShowUrl($house->slug) }}" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="article-head-price">Giá: {{ MoneyHelper::price($house->price, $house->money_unit, $house->sale_type) }}</div>
				</div>
				<div class="col-md-2">
					<div class="article-head-code">MS{{ $house->id }}</div>
				</div>
				<div class="col-md-2">
					<div class="article-head-date"><time>{{ $house->start_date }}</time></div>
				</div>
			</div>
		</section>

		{{-- gallery section --}}
		@include('partial.resource._gallery', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])

		<section class="article-description">
			{!! nl2br($house->description) !!}
		</section>

		<section class="article-detail">
			<header><h3 class="article-section-title">Chi tiết</h3></header>
			<ul class="row">
				<li class="col-md-4 active">Diện tích sử dụng: <span>{{ $house->m2 }}m2</span></li>
				<li class="col-md-4 @if (0 != $house->road) active @endif">
					Đường trước nhà: @if (0 != $house->road) <span>{{ $house->road }}m2</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->common_room) active @endif">
					Phòng sinh hoạt chung: @if (0 != $house->common_room) <span>{{ $house->common_room }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->toilet) active @endif">
					Số phòng vệ sinh: @if (0 != $house->toilet) <span>{{ $house->toilet }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->bedroom) active @endif">
					Số phòng ngủ: @if (0 != $house->bedroom) <span>{{ $house->bedroom }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->balcony) active @endif">
					Ban công: @if (0 != $house->balcony) <span>{{ $house->balcony }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->floors) active @endif">
					Số tầng: @if (0 != $house->floors) <span>{{ $house->floors }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->kitchen) active @endif">
					Bếp: @if (0 != $house->kitchen) <span>{{ $house->kitchen }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->logia) active @endif">
					Logia: @if (0 != $house->logia) <span>{{ $house->logia }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->direction) active @endif">
					Hướng nhà: @if (0 != $house->direction) <span>{{ HouseDirectionOption::getLabel($house->direction) }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->living_room) active @endif">
					Phòng khách: @if (0 != $house->living_room) <span>{{ $house->living_room }}</span> @endif
				</li>
				<li class="col-md-4 @if (0 != $house->license) active @endif">
					Tình trạng pháp lý: @if (0 != $house->license) <span>{{ HouseLicenseOption::getLabel($house->license) }}</span> @endif
				</li>
			</ul>
		</section>

		<section class="article-feature">
			<header><h3 class="article-section-title">Tính năng</h3></header>
			<ul class="row">
				@foreach(HouseFeatureOption::getOptions() as $feature => $label)
					<li class="col-md-3 @if(in_array($feature, $house->feature)) active @endif">
						<span aria-hidden="true" class="glyphicon glyphicon-ok"></span>{{ $label }}
					</li>
				@endforeach
			</ul>
		</section>
		<hr>
		<div class="fb-comments" data-href="{{ houseShowUrl($house->slug) }}" data-width="675" data-numposts="2"></div>
	</article>

	<section class="relation">
		<header><h3 class="article-section-title">Nhà đất tương tự</h3></header>
		<div class="thumb thumb-br-default clearfix">
			<div class="row">
				@foreach ($housesRelation as $relation)
					@include('partial.resource.house._item', ['model' => $relation])
				@endforeach
			</div>
		</div>
	</section>

@stop