@extends('layout')

@section('meta_title'){{ $project->meta_title }}@stop
@section('meta_description'){{ $project->meta_description }}@stop

@section('breadcrumb')
  <li><a href="/du-an">Dự án</a></li>
  <li class="active">{{ $project->title }}</li>
@stop

@section('sidebarHook')
  <nav>
    <ul class="sidebar-pagination">
      @if (is_null($preview))
        <li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">«</span></a></li>
      @else
        <li><a rel="preview" href="{{ projectShowUrl($preview->slug) }}" title="{{ $preview->title }}">«</a></li>
      @endif
      @if (is_null($next))
        <li class="disabled"><a rel="preview" href="#" title="disabled"><span aria-hidden="true">»</span></a></li>
      @else
        <li><a rel="next" href="{{ projectShowUrl($next->slug) }}" title="{{ $next->title }}">»</a></li>
      @endif
    </ul>
  </nav>

  @include('partial.resource._contact')
@stop

{{--@section('style')--}}
  {{--<meta property="og:url"           content="{{ projectShowUrl($project->slug) }}" />--}}
  {{--<meta property="og:type"          content="website" />--}}
  {{--<meta property="og:title"         content="{{ $project->title }}" />--}}
  {{--<meta property="og:description"   content="{{ $project->description }}" />--}}
  {{--<meta property="og:image"         content="{{ ImageHelper::avatar(ResourceOption::DU_AN, $project->user_id, $project->images) }}" />--}}
{{--@stop--}}

@section('content')

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="text-align: center;">
    <li role="presentation" style="width: 155px;" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Giới thiệu</a></li>
    <li role="presentation" style="width: 155px;"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Vị trí</a></li>
    <li role="presentation" style="width: 155px;"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="tab">Tiến độ thanh toán</a></li>
  </ul>

<article class="article">
  <header><h1 class="article-title">{{ $project->title }}</h1></header>
  <section class="article-head">
    <div class="row">
      <div class="col-md-9">
        {{-- */ $location = LocationHelper::full($project->city, $project->district, $project->ward) /* --}}
        <address class="article-head-address">
          Địa chỉ:
          @include('partial.resource._location', ['model' => $project])
        </address>
      </div>
      <div class="col-md-3">
        <div class="article-head-fb-like" style="float: left">
          <div class="fb-like" data-href="{{ projectShowUrl($project->slug) }}" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
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

  <hr>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="description">
      <section class="article-description">
        {{-- gallery section --}}
        @include('partial.resource._gallery', ['model' => $project, 'resource' => ResourceOption::DU_AN])
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
  <div class="fb-comments" data-href="{{ projectShowUrl($project->slug) }}" data-width="675" data-numposts="2"></div>
</article>

  <section class="relation">
    <header><h3 class="article-section-title">Dự án tương tự</h3></header>
    <div class="thumb thumb-br-default clearfix">
      <div class="row">
        @foreach ($projectsRelation as $relation)
          @include('partial.resource.project._item', ['model' => $relation, 'resource' => ResourceOption::DU_AN])
        @endforeach
      </div>
    </div>
  </section>
@stop
