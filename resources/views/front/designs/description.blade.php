@extends('layout')

@section('breadcrumb')
  <li class="active">{{ $company->title }}</li>
@stop

@section('sidebarHook')
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
  <article class="article">
    <header>
      <h1 class="article-title">{{ $company->title }}</h1>
    </header>
    {!! $company->short_description !!}

    <header>
      <h1 class="article-title">Liên hệ với chúng tôi để được tư vấn</h1>
    </header>
    {!! $company->description !!}
  </article>

  <hr>
  <div class="fb-comments" data-href="{{ route('front.design.description', $company->slug) }}" data-width="675" data-numposts="2"></div>
  <hr>
@stop
