@extends('layout')

@section('breadcrumb')
  <li><a href="{{ route('front.design.index') }}">Thiết kế thi công</a></li>
  <li class="active">{{ $design->title or '' }}</li>
@stop

@section('fb_meta')
  	<meta property="og:url"           	content="{{ UrlHelper::show(ResourceOption::THIET_KE, ['slug' => $design->slug]) }}" />
    <meta property="og:type"          	content="article" />
    <meta property="og:title"         	content="{{ $design->title }}" />
    <meta property="og:description"   	content="{{ str_limit(strip_tags($design->description), 100) }}" />
    <meta property="og:image"         	content="{{ ImageHelper::avatar(ResourceOption::THIET_KE, 1, $design->images) }}" />
    <meta property="og:image:width" 	content="675" />
	<meta property="og:image:height" 	content="402" />
    <meta property="fb:app_id" 		  	content="674952055924751">
@stop


@section('sidebarHook')
  <nav>
    <ul class="sidebar-pagination">
      @if (is_null($preview))
        <li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">«</span></a></li>
      @else
        <li><a rel="preview" href="{{ route('front.design.show', $preview->slug) }}" title="{{ $preview->title }}">«</a></li>
      @endif
      @if (is_null($next))
        <li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">»</span></a></li>
      @else
        <li><a rel="next" href="{{ route('front.design.show', $next->slug) }}" title="{{ $next->title }}">»</a></li>
      @endif
    </ul>
  </nav>

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
      <li><i class="fa fa-envelope"></i><a href="mailto:{{ $contact->email }}" target="_top">{{ str_limit($contact->email, 22) }}</a></li>
      <li><i class="fa fa-fax"></i>{{ $contact->mobile }}</li>
      <li><i class="fa fa-facebook-official"></i>{{ str_limit($contact->facebook, 22) }}</li>
      <li><i class="fa fa-skype"></i><a href="skype:{{ $contact->skype }}?call">{{ str_limit($contact->skype, 22) }}</a></li>
      <li><i class="fa fa-globe"></i>{{ str_limit($contact->website, 22) }}</li>
    </ul>
  </section>
@stop

@section('content')
  <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
    @if (2 == $design->category)
	    <a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/hien-dai') }}">Hiện đại</a>
	    <a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/co-dien') }}">Cổ điển</a>
	    <a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/can-ho') }}">Căn hộ</a>
	    <a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/khac') }}">Thể loại khác</a>
  	@else 
  		<a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/biet-thu-pho') }}">Biệt thự phố</a>
	    <a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/biet-thu-vuon') }}">Biệt thự vườn</a>
	    <a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/nha-pho') }}">Nhà phố</a>
	    <a style="border-color: #fff;" role="button" class="btn btn-primary" href="{{ route('front.design.category', $categoryUri. '/khac') }}">Thể loại khác</a>
  	@endif
  </div>

  <article class="article">
    <header><h1 class="article-title">{{ $design->title }}</h1></header>
    <section class="article-head">
      <div class="row">
        <div class="col-md-9">
          <address class="article-head-address">
            Địa chỉ:
            @include('partial.resource._location', ['model' => $design])
          </address>
        </div>
        <div class="col-md-3">
          <div class="article-head-fb-like">
            <div class="fb-like" data-href="{{ UrlHelper::show(ResourceOption::THIET_KE, ['slug' => $design->slug]) }}" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
          </div>
        </div>
      </div>
    </section>

    {{-- gallery section --}}
    {{-- */ $design->user_id = 1 /* --}}
    @include('partial.resource._gallery', ['model' => $design, 'resource' => ResourceOption::THIET_KE])

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
            @include('front.designs._article', ['model' => $other])
          @endforeach
        </div>
      </div>
    </section>
  </article>
@stop