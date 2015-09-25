@extends('layout')

@section('content')
	<section class="company-intro">
		<div class="row">
			<div class="col-md-8">
				<header><h3>{{ $company->title }}</h3></header>
				{!! nl2br($company->short_description) !!}
			</div>
			<div class="col-md-4">
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
						@include('partial._article', ['model' => $house,
														'isSale' => $house->is_sale,
														'col' => 4, 'iw' => 200, 'ih' => 150])
					@endforeach
				</div>
				<a class="btn thumb-btn-viewmore" href="{{ route('company.houseList', ['company' => $company->slug, 'filter' => IsSoldOption::CHUA_BAN]) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
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
						@include('partial._article', ['model' => $house,
														'isSale' => $house->is_sale,
														'col' => 4, 'iw' => 200, 'ih' => 150])
					@endforeach
				</div>
				<a class="btn thumb-btn-viewmore" href="{{ route('company.houseList', ['company' => $company->slug, 'filter' => IsSoldOption::DA_BAN]) }}" role="button"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
			</div>
		</section>
	@endif

	<section class="company-description">
		<header><h3>Liên hệ với chúng tôi để được tư vấn</h3></header>
		{!! nl2br($company->description) !!}
	</section>
@stop

@section('breadcrumb')
	<li class="active">{{ $company->title }}</li>
@stop

@section('meta_title'){{ $company->meta_title }}@stop
@section('meta_description'){{ $company->meta_description }}@stop