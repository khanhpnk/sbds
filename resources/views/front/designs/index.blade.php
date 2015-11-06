@extends('one_col_layout')

@section('breadcrumb')
	<li class="active">Thiết kế thi công</li>
@stop

@section('style')
  <style>
	@parent
	.thumb-img {
	  display: block;
	}
  </style>
@endsection

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
						<h4 class="media-heading">Thông tin liên hệ</h4>
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

	@if (0 < count($architectures))
		<section class="list">
			<header>
				<h2 class="thumb-title">Kiến trúc</h2>
				<nav class="simple-pagination">{!! $architectures->render() !!}</nav>
			</header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($architectures as $house)
						@include('front.designs._article', ['model' => $house, 'col' => 3])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (0 < count($furnitures))
		<section>
			<header>
				<h2 class="thumb-title">Nội thất</h2>
				<nav class="simple-pagination">{!! $furnitures->render() !!}</nav>
			</header>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($furnitures as $house)
						@include('front.designs._article', ['model' => $house, 'col' => 3])
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
						@include('front.designs._article', ['model' => $house, 'col' => 3])
					@endforeach
				</div>
			</div>
		</section>
	@endif

	<section class="list">
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