@extends('layout')

@section('content')
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Giới thiệu</a></li>
    <li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Vị trí</a></li>
    <li role="presentation"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="tab">Tiến độ thanh toán</a></li>
  </ul>

<article class="article">
  <header><h1 class="article-title">{{ $project->title }}</h1></header>
  <section class="article-head">
    <div class="row">
      <div class="col-md-9">
        {{-- */ $location = LocationHelper::full($project->city, $project->district, $project->ward) /* --}}
        <address class="article-head-address">
          Địa chỉ:
          {{ $project->address }},
          <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                          'city' => str_slug($location['city']),
                          'cityId' 			=> $project->city,
                          'district' 		=> str_slug($location['district']),
                          'districtId' 	=> $project->district,
                          'ward' 				=> str_slug($location['ward']),
                          'wardId' 			=> $project->ward]) }}">
            {{ $location['ward'] }}
          </a>
          <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                          'city' => str_slug($location['city']),
                          'cityId' 			=> $project->city,
                          'district' 		=> str_slug($location['district']),
                          'districtId' 	=> $project->district]) }}">
            {{ $location['district'] }}
          </a>
          <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                          'city' => str_slug($location['city']),
                          'cityId' => $project->city]) }}">
            {{ $location['city'] }}
          </a>
        </address>
      </div>
      <div class="col-md-3">
        <div style="float: left"><i class="fa fa-print" onclick="window.print();"></i></div>
        <div class="article-head-fb-like" style="float: left">
          <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <div class="article-head-code">MS{{ $project->id }}</div>
      </div>
      <div class="col-md-2">
        <div class="article-head-date"><time>{{ $project->start_date }}</time></div>
      </div>
    </div>
  </section>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="description">
      <section class="article-description">
        {{-- gallery section --}}
        @include('houses._gallery', ['model' => $project, 'resource' => ResourceOption::DU_AN])
        <hr>
        {!! nl2br($project->description) !!}
      </section>
    </div>
    <div role="tabpanel" class="tab-pane" id="location">
      <section class="article-description">
        {!! nl2br($project->location) !!}
      </section>
    </div>
    <div role="tabpanel" class="tab-pane" id="schedule">
      <section class="article-description">
        {!! nl2br($project->schedule) !!}
      </section>
    </div>
  </div>
  <hr>
  <div class="fb-comments" data-href="{{ UrlHelper::show(ResourceOption::DU_AN, ['slug' => $project->slug]) }}" data-width="675" data-numposts="2"></div>
</article>

  <section class="relation">
    <header><h3 class="article-section-title">Dự án tương tự</h3></header>
    <div class="thumb thumb-br-default clearfix">
      <div class="row">
        @foreach ($projectsRelation as $relation)
          @include('projects._article', ['model' => $relation, 'resource' => ResourceOption::DU_AN])
        @endforeach
      </div>

      <a class="btn btn-main" href="{{ UrlHelper::index(ResourceOption::DU_AN) }}" role="button">
        <i class="fa fa-plus-square-o"></i> Xem thêm
      </a>
    </div>
  </section>
@stop

@section('breadcrumb')
  <li><a href="{{ UrlHelper::index(ResourceOption::DU_AN) }}">Dự án</a></li>
  <li class="active">{{ $project->title }}</li>
@stop

@section('sidebarHook')
  <nav>
    <ul class="sidebar-pagination">
      @if (is_null($preview))
        <li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">«</span></a></li>
      @else
        <li><a rel="preview" href="{{ route('project.show', $preview->slug) }}" title="{{ $preview->title }}">«</a></li>
      @endif
      @if (is_null($next))
        <li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">»</span></a></li>
      @else
        <li><a rel="next" href="{{ route('project.show', $next->slug) }}" title="{{ $next->title }}">»</a></li>
      @endif
    </ul>
  </nav>

  <section class="contact-info">
    <header><h3 class="contact-info-header">Thông tin liên hệ</h3></header>
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
  </section>
@stop

@section('meta_title'){{ $project->meta_title }}@stop
@section('meta_description'){{ $project->meta_description }}@stop
