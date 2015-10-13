@extends('layout')

@section('meta_title'){{ $article->meta_title }}@stop
@section('meta_description'){{ $article->meta_description }}@stop

@section('breadcrumb')
  <li class="active">{{ $article->title }}</li>
@stop

@if (!Auth::guest())
  @section('sidebarHook')
    @include('partial._user_nav')
  @stop
@endif

@section('content')
  <article class="article">
    <header>
      <h1 class="article-title">{{ $article->title }}</h1>
      <div class="article-time"><time>{{ $article->created_at }}</time></div>
    </header>

    {!! $article->description !!}
  </article>

  <hr>
  <div class="fb-comments" data-href="{{ route('front.article.show', $article->slug) }}" data-width="675" data-numposts="2"></div>
  <hr>

  <section class="relation">
    <header><h1 class="relation-title">Các tin khác</h1></header>
    <ul class="relation-list">
      @foreach ($relations as $relation)
        <li>
          <a href="{{ route('front.article.show', $relation->slug) }}">
            <div class="relation-link"><i class="fa fa-link"></i>{{ $relation->title }}</div>
            <div class="relation-time"><time>{{ $relation->created_at }}</time></div>
          </a>
        </li>
      @endforeach
    </ul>
  </section>
@stop
