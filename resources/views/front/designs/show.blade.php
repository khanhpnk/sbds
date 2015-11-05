@extends('layout')

@section('breadcrumb')
  <li><a href="{{ route('front.design.index') }}">Thiết kế thi công</a></li>
  <li class="active">{{ $design->title or '' }}</li>
@stop

@section('sidebarHook')
  <section class="contact-info">
    <header><h3 class="contact-info-header">Thông tin</h3></header>
    <ul>
      <li>Mã: MS{{ $design->id }}</li>
      <li>Thiết kế: {{ $design->designers }}</li>
      <li>Thiết kế nội thất: {{ $design->designers_furniture }}</li>
      <li>Thi công: {{ $design->supervisor }}</li>
      <li>Diện tích lô đất: {{ $design->land_m2 }}m2</li>
      <li>Diện tích xây dựng: {{ $design->build_m2 }}m2</li>
      <li>Số tầng cao: {{ $design->number_of_floors }}</li>
      <li>Bề rộng mặt tiền: {{ $design->frontage_m2 }}m2</li>
      <li>Năm thiết kế: {{ $design->year }}</li>
    </ul>
  </section>

  <section class="contact-info">
    <header><h3 class="contact-info-header">Thông tin liên hệ</h3></header>
    <ul>
      <li><i class="fa fa-user"></i>{{ $contact->name }}</li>
      {{-- */ $location = LocationHelper::full($contact->city, $contact->district, $contact->ward) /* --}}
      <li><i class="fa fa-home"></i>{{$contact->address}} {{ $location['ward'] }}, {{ $location['district'] }}, {{ $location['city'] }}</li>
      <li><i class="fa fa-phone-square"></i>{{ $contact->phone }}</li>
      <li><i class="fa fa-envelope"></i><a href="mailto:{{ $contact->email }}" target="_top">{{ str_limit($contact->email, 24) }}</a></li>
      <li><i class="fa fa-fax"></i>{{ $contact->mobile }}</li>
      <li><i class="fa fa-facebook-official"></i>{{ str_limit($contact->facebook, 24) }}</li>
      <li><i class="fa fa-skype"></i><a href="skype:{{ $contact->skype }}?call">{{ str_limit($contact->skype, 24) }}</a></li>
      <li><i class="fa fa-globe"></i>{{ str_limit($contact->website, 24) }}</li>
    </ul>
  </section>
@stop

@section('content')
  <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
    {{--@if (\Model\Service\Design\SubCategory::BIET_THU_PHO == $design->sub_category) active @endif--}}
    <a role="button" class="btn btn-default" href="{{ route('front.design.category', 'biet-thu-pho') }}">Biệt thự phố</a>
    <a role="button" class="btn btn-default" href="{{ route('front.design.category', 'biet-thu-vuon') }}">Biệt thự vườn</a>
    <a role="button" class="btn btn-default" href="{{ route('front.design.category', 'nha-pho') }}">Nhà phố</a>
    <a role="button" class="btn btn-default" href="{{ route('front.design.category', 'khac') }}">Thể loại khác</a>
  </div>

  <article class="article">
    @if($design)
    <header><h1 class="article-title">{{ $design->title }}</h1></header>
    <section class="article-head">
      <div class="row">
        <div class="col-md-9">
          {{-- */ $location = LocationHelper::full($design->city, $design->district, $design->ward) /* --}}
          <address class="article-head-address">
            Địa chỉ:
            {{ $design->address }},
            <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                            'city' => str_slug($location['city']),
                            'cityId' 			=> $design->city,
                            'district' 		=> str_slug($location['district']),
                            'districtId' 	=> $design->district,
                            'ward' 				=> str_slug($location['ward']),
                            'wardId' 			=> $design->ward]) }}">
              {{ $location['ward'] }}
            </a>
            <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                            'city' => str_slug($location['city']),
                            'cityId' 			=> $design->city,
                            'district' 		=> str_slug($location['district']),
                            'districtId' 	=> $design->district]) }}">
              {{ $location['district'] }}
            </a>
            <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                            'city' => str_slug($location['city']),
                            'cityId' => $design->city]) }}">
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
        <div class="col-md-2">
          <div class="article-head-code">N{{ $design->id }}</div>
        </div>
        <div class="col-md-2">
          <div class="article-head-date"><time>{{ $design->start_date }}</time></div>
        </div>
      </div>
    </section>

    {{-- gallery section --}}
    {{-- */ $design->user_id = 1 /* --}}
    @include('houses._gallery', ['model' => $design, 'resource' => ResourceOption::THIET_KE])

    <section class="article-description">
      {!! nl2br($design->description) !!}
    </section>

    <hr>
    <div class="fb-comments" data-href="{{ UrlHelper::show(ResourceOption::THIET_KE, ['slug' => $design->slug]) }}" data-width="675" data-numposts="2"></div>

    <section class="relation">
      <header><h3 class="article-section-title">Khác</h3></header>
      <div class="thumb thumb-br-default clearfix">
        <div class="row">
          @foreach ($others as $other)
            @include('front.designs._article', ['model' => $other, 'resource' => ResourceOption::NHA_DAT])
          @endforeach
        </div>
      </div>
    </section>
    @else
      Không có dữ liệu
    @endif
  </article>
@stop