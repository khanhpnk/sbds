@extends('one_col_layout')

@section('breadcrumb')
	<li class="active">Thiết kế thi công</li>
@stop

@section('content')
	<section class="company-info">
		<header><h2 class="company-info-title">{{ $company->title }}</h2></header>
		<div class="row">
			<div class="col-md-6">
				{!! nl2br($company->short_description) !!}
			</div>
			<div class="col-md-6">
				<div class="media company-media">
					<div class="media-left">
						<img class="media-object" width="140" height="105" src="{{ ImageHelper::getCompanyAvatar($company->avatar) }}" alt="{{ $company->title }}">
						<a role="button" href="{{ route('front.design.description') }}" class="btn btn-main"><i class="fa fa-plus-square-o"></i> Xem thêm</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">Thông tin liên hệ</h4>
						<ul>
							<li><i class="fa fa-user"></i>{{ $contactInfo->name }}</li>
							{{-- */ $location = LocationHelper::full($contactInfo->city, $contactInfo->district, $contactInfo->ward) /* --}}
							<li><i class="fa fa-home"></i>{{$contactInfo->address}} {{ $location['ward'] }}, {{ $location['district'] }}, {{ $location['city'] }}</li>
							<li><i class="fa fa-phone-square"></i>{{ $contactInfo->phone }}</li>
							<li><i class="fa fa-envelope"></i><a href="mailto:{{ $contactInfo->email }}" target="_top">{{ str_limit($contactInfo->email, 22) }}</a></li>
							<li><i class="fa fa-fax"></i>{{ $contactInfo->mobile }}</li>
							<li><i class="fa fa-facebook-official"></i>{{ str_limit($contactInfo->facebook, 22) }}</li>
							<li><i class="fa fa-skype"></i><a href="skype:{{ $contactInfo->skype }}?call">{{ str_limit($contactInfo->skype, 22) }}</a></li>
							<li><i class="fa fa-globe"></i>{{ str_limit($contactInfo->website, 22) }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	@if (0 < count($architectures))
		@include('front.designs._section', ['houses' => $architectures, 'title' => 'Kiến trúc'])
	@endif
	@if (0 < count($furnitures))
		@include('front.designs._section', ['houses' => $architectures, 'title' => 'Nội thất'])
	@endif
	@if (0 < count($constructions))
		@include('front.designs._section', ['houses' => $architectures, 'title' => 'Thi công'])
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