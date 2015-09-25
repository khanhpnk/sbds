@extends('layout')

@section('content')
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Giới thiệu</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Vị trí</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Thiết kế</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Tiến độ thanh toán</a></li>
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
          <a href="{{ UrlHelper::all($project->is_sale, ['city' 				=> str_slug($location['city']),
																													'cityId' 			=> $project->city,
																													'district' 		=> str_slug($location['district']),
																													'districtId' 	=> $project->district,
																													'ward' 				=> str_slug($location['ward']),
																													'wardId' 			=> $project->ward]) }}">
            {{ $location['ward'] }}
          </a>
          <a href="{{ UrlHelper::all($project->is_sale, ['city' 				=> str_slug($location['city']),
																													'cityId' 			=> $project->city,
																													'district' 		=> str_slug($location['district']),
																													'districtId' 	=> $project->district]) }}">
            {{ $location['district'] }}
          </a>
          <a href="{{ UrlHelper::all($project->is_sale, ['city' => str_slug($location['city']), 'cityId' => $project->city]) }}">
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
      <div class="col-md-8">
        <div class="article-head-price">{{ MoneyHelper::price($project->price, $project->money_unit, $project->is_sale) }}</div>
      </div>
      <div class="col-md-2">
        <div class="article-head-code">N{{ $project->id }}</div>
      </div>
      <div class="col-md-2">
        <div class="article-head-date"><time>{{ $project->start_date }}</time></div>
      </div>
    </div>
  </section>

  {{-- gallery section --}}
  @include('houses._gallery', ['model' => $project])

  <section class="article-description">
    {!! nl2br($project->description) !!}
  </section>
</article>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

    </div>
    <div role="tabpanel" class="tab-pane" id="messages">

    </div>
    <div role="tabpanel" class="tab-pane" id="settings">

    </div>
  </div>
@stop
