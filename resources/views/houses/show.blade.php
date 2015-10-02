@extends('layout')

@section('content')
	<article class="article">
		<header><h1 class="article-title">{{ $house->title }}</h1></header>
		<section class="article-head">
			<div class="row">
				<div class="col-md-9">
					{{-- */ $location = LocationHelper::full($house->city, $house->district, $house->ward) /* --}}
					<address class="article-head-address">
						Địa chỉ:
						{{ $house->address }},
						<a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
                          'city' => str_slug($location['city']),
                          'cityId' 			=> $house->city,
                          'district' 		=> str_slug($location['district']),
                          'districtId' 	=> $house->district,
                          'ward' 				=> str_slug($location['ward']),
                          'wardId' 			=> $house->ward]) }}">
							{{ $location['ward'] }}
						</a>
						<a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
						              'city' => str_slug($location['city']),
                          'cityId' 			=> $house->city,
                          'district' 		=> str_slug($location['district']),
                          'districtId' 	=> $house->district]) }}">
							{{ $location['district'] }}
						</a>
						<a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, [
						              'city' => str_slug($location['city']),
						              'cityId' => $house->city]) }}">
							{{ $location['city'] }}
						</a>
					</address>
				</div>
				<div class="col-md-3">
					<div class="article-head-fb-like">
						<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="article-head-price">{{ MoneyHelper::price($house->price, $house->money_unit, $house->is_sale) }}</div>
				</div>
				<div class="col-md-2">
					<div class="article-head-code">N{{ $house->id }}</div>
				</div>
				<div class="col-md-2">
					<div class="article-head-date"><time>{{ $house->start_date }}</time></div>
				</div>
			</div>
		</section>

		{{-- gallery section --}}
		@include('houses._gallery', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])

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
		<div class="fb-comments" data-href="{{ UrlHelper::show(ResourceOption::NHA_DAT, ['slug' => $house->slug]) }}" data-width="675" data-numposts="2"></div>
	</article>

	<section class="relation">
		<header><h3 class="article-section-title">Nhà đất tương tự</h3></header>
		<div class="thumb thumb-br-default clearfix">
			<div class="row">
				@foreach ($housesRelation as $relation)
          @include('houses._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])
				@endforeach
			</div>

			<a class="btn btn-main" href="{{ UrlHelper::index(ResourceOption::NHA_DAT, ['type' => IsSaleUriOption::getLabel($house->is_sale)]) }}" role="button">
				<i class="fa fa-plus-square-o"></i> Xem thêm
			</a>
		</div>
	</section>
@stop

@section('breadcrumb')
	<li><a href="{{ UrlHelper::index(ResourceOption::NHA_DAT, ['type' => IsSaleUriOption::getLabel($house->is_sale)]) }}">{{ IsSaleOption::getLabel($house->is_sale) }}</a></li>
	<li class="active">{{ $house->title }}</li>
@stop

@section('contactInfo')
	<section class="contact-info">
		<header><h3 class="contact-info-header">Thông tin liên hệ</h3></header>
		<ul>
			<li><i class="fa fa-user"></i>{{ $contactInfo->name }}</li>
			{{-- */ $location = LocationHelper::full($contactInfo->city, $contactInfo->district, $contactInfo->ward) /* --}}
			<li><i class="fa fa-home"></i>{{$contactInfo->address}} {{ $location['ward'] }}, {{ $location['district'] }}, {{ $location['city'] }}</li>
			<li><i class="fa fa-phone-square"></i>{{ $contactInfo->phone }}</li>
			<li><i class="fa fa-envelope"></i>{{ str_limit($contactInfo->email, 24) }}</li>
			<li><i class="fa fa-fax"></i>{{ $contactInfo->mobile }}</li>
			<li><i class="fa fa-facebook-official"></i>{{ str_limit($contactInfo->facebook, 24) }}</li>
			<li><i class="fa fa-skype"></i>{{ str_limit($contactInfo->skype, 24) }}</li>
			<li><i class="fa fa-globe"></i>{{ str_limit($contactInfo->website, 24) }}</li>
		</ul>
	</section>
@stop

@section('meta_title'){{ $house->meta_title }}@stop
@section('meta_description'){{ $house->meta_description }}@stop