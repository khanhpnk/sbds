@extends('layout')

@section('breadcrumb')
	<li><a href="{{ route('front.design.index') }}">Thiết kế thi công</a></li>
	<li class="active">Thiết kế thi công</li>
@stop

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
						<li><i class="fa fa-envelope"></i>{{ str_limit($contactInfo->email, 22) }}</li>
						<li><i class="fa fa-fax"></i>{{ $contactInfo->mobile }}</li>
						<li><i class="fa fa-facebook-official"></i>{{ str_limit($contactInfo->facebook, 22) }}</li>
						<li><i class="fa fa-skype"></i>{{ str_limit($contactInfo->skype, 22) }}</li>
						<li><i class="fa fa-globe"></i>{{ str_limit($contactInfo->website, 22) }}</li>
					</ul>
				</section>
			</div>
		</div>
	</section>

	@if (0 < count($architectures))
		<section class="list">
			<header>
				<h2 class="thumb-title">Kiến trúc</h2>
				<nav class="simple-pagination">{!! $architectures->render() !!}</nav>
			</header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($architectures as $house)
						@include('front.designs._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($furnitures))
		<section class="list">
			<header>
				<h2 class="thumb-title">Nội thất</h2>
				<nav class="simple-pagination">{!! $furnitures->render() !!}</nav>
			</header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($furnitures as $house)
						@include('front.designs._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($constructions))
		<section class="list">
			<header>
				<h2 class="thumb-title">Thi công</h2>
				<nav class="simple-pagination">{!! $constructions->render() !!}</nav>
			</header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($constructions as $house)
						@include('front.designs._article', ['model' => $house, 'resource' => ResourceOption::NHA_DAT])
					@endforeach
				</div>
			</div>
		</section>
	@endif
@stop