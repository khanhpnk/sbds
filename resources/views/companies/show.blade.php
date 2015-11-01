@extends('one_col_layout')

@section('content')
	<section class="company-info">
		<header><h2 class="company-info-title">{{ $company->title }}</h2></header>
		<div class="row">
			<div class="col-md-5">
				{!! nl2br($company->short_description) !!}
			</div>
			<div class="col-md-7">
				<div class="media br-info">
					<div class="media-left">
						<img class="media-object" width="200" height="150" src="{{ ImageHelper::getCompanyAvatar($company->avatar) }}" alt="{{ $company->title }}">
					</div>
					<div class="media-body">
						<h4 class="media-heading">Liên hệ với chúng tôi</h4>
						<ul>
							<li><i class="fa fa-user"></i>{{ $contactInfo->name }}</li>
							{{-- */ $location = LocationHelper::full($contactInfo->city, $contactInfo->district, $contactInfo->ward) /* --}}
							<li><i class="fa fa-home"></i>{{$contactInfo->address}} {{ $location['ward'] }}, {{ $location['district'] }}, {{ $location['city'] }}</li>
							<li><i class="fa fa-phone-square"></i>{{ $contactInfo->phone }}</li>
							<li><i class="fa fa-envelope"></i><a href="mailto:{{ $contactInfo->email }}" target="_top">{{ str_limit($contactInfo->email, 24) }}</a></li>
							<li><i class="fa fa-fax"></i>{{ $contactInfo->mobile }}</li>
							<li><i class="fa fa-facebook-official"></i>{{ str_limit($contactInfo->facebook, 24) }}</li>
							<li><i class="fa fa-skype"></i><a href="skype:{{ $contactInfo->skype }}?call">{{ str_limit($contactInfo->skype, 24) }}</a></li>
							<li><i class="fa fa-globe"></i>{{ str_limit($contactInfo->website, 24) }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	@if (0 < count($houses))
		<section class="list">
			<header>
				<h2 class="thumb-title">Đang giao dịch</h2>
				{{--<nav class="simple-pagination">{!! $housesUnexpired->render() !!}</nav>--}}
			</header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($houses as $house)
						@include('houses._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT, 'col' => 3])
					@endforeach
				</div>

				{{--<a class="btn btn-main" href="{{ route('company.houseList', ['company' => $company->slug, 'filter' => IsSoldOption::CHUA_BAN]) }}" role="button">--}}
					{{--<i class="fa fa-plus-square-o"></i> Xem thêm--}}
				{{--</a>--}}
			</div>
		</section>
	@endif

	@if (0 < count($housesSold))
		<section class="list">
			<header>
				<h2 class="thumb-title">Đã môi giới thành công</h2>
				{{--<nav class="simple-pagination">{!! $housesExpired->render() !!}</nav>--}}
			</header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($housesSold as $house)
						@include('houses._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT, 'col' => 3])
					@endforeach
				</div>
				{{--<a class="btn btn-main" href="{{ route('company.houseList', ['company' => $company->slug, 'filter' => IsSoldOption::DA_BAN]) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>--}}
			</div>
		</section>
	@endif

	<section class="company-info">
		<header><h2 class="company-info-title">Liên hệ với chúng tôi để được tư vấn</h2></header>
		{!! nl2br($company->description) !!}
	</section>
@stop

@section('breadcrumb')
	<li><a href="{{ UrlHelper::index(ResourceOption::CONG_TY) }}">Công ty}</a></li>
	<li class="active">{{ $company->title }}</li>
@stop

@section('meta_title'){{ $company->meta_title }}@stop
@section('meta_description'){{ $company->meta_description }}@stop