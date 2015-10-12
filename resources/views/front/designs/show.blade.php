@extends('layout')

@section('breadcrumb')
  <li><a href="{{ route('front.design.index') }}">Thiết kế thi công</a></li>
  <li class="active">{{ $design->title }}</li>
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

@section('content')
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    @if (0 < count($design1))
      <li role="presentation" @if (\Model\Service\Design\SubCategory::BIET_THU_PHO == $design->sub_category) class="active" @endif><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Biệt thự phố</a></li>
    @endif
    @if (0 < count($design2))
      <li role="presentation" @if (\Model\Service\Design\SubCategory::BIET_THU_VUON == $design->sub_category) class="active" @endif><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Biệt thự vườn</a></li>
    @endif
    @if (0 < count($design3))
      <li role="presentation" @if (\Model\Service\Design\SubCategory::NHA_PHO == $design->sub_category) class="active" @endif><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Nhà phố</a></li>
    @endif
    @if (0 < count($design4))
      <li role="presentation" @if (\Model\Service\Design\SubCategory::KHAC == $design->sub_category) class="active" @endif><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="tab">Thể loại khác</a></li>
    @endif
  </ul>

<article class="article">
  <!-- Tab panes -->
  <div class="tab-content">
    @if (0 < count($design1))
      <div role="tabpanel" class="tab-pane @if (\Model\Service\Design\SubCategory::BIET_THU_PHO == $design->sub_category) active @endif" id="description">
        @include('front.designs._tab', ['design' => $design1[0], 'designs' => $design1])
      </div>
    @endif
    @if (0 < count($design2))
      <div role="tabpanel" class="tab-pane @if (\Model\Service\Design\SubCategory::BIET_THU_VUON == $design->sub_category) active @endif" id="location">
        @include('front.designs._tab', ['design' => $design2[0], 'designs' => $design2])
      </div>
    @endif
    @if (0 < count($design3))
      <div role="tabpanel" class="tab-pane @if (\Model\Service\Design\SubCategory::NHA_PHO == $design->sub_category) active @endif" id="gallery">
        @include('front.designs._tab', ['design' => $design3[0], 'designs' => $design3])
      </div>
    @endif
    @if (0 < count($design4))
      <div role="tabpanel" class="tab-pane @if (\Model\Service\Design\SubCategory::KHAC == $design->sub_category) active @endif" id="schedule">
        @include('front.designs._tab', ['design' => $design4[0], 'designs' => $design4])
      </div>
    @endif
  </div>
</article>
@stop