@extends('layout')

@section('meta_title'){{ $article->meta_title }}@stop
@section('meta_description'){{ $article->meta_description }}@stop

@section('breadcrumb')
  <li class="active">{{ $article->title }}</li>
@stop

@section('sidebarHook')
  <nav role="navigation">
    <ul class="nav user-nav">
      <li class="user-nav-header">Bài viết</li>
      <li><a href="{{ route('front.article.index', '1') }}">+ Giới thiệu về house</a></li>
      <li><a href="{{ route('front.article.index', '2') }}">+ Tuyển dụng</a></li>
      <li><a href="{{ route('front.article.index', '3') }}">+ Nội quy đăng tin</a></li>
      <li><a href="{{ route('front.article.index', '4') }}">+ Hướng dẫn sử dụng</a></li>
      <li><a href="{{ route('front.article.index', '5') }}">+ Báo giá</a></li>
      <li><a href="{{ route('front.article.index', '6') }}">+ Hướng dẫn thanh toán</a></li>
    </ul>
  </nav>
@stop

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

  @if (0 < count($relations))
    <section class="relation">
      <header><h1 class="relation-title">Các tin khác</h1></header>
      <ul class="relation-list">
        @foreach ($relations as $relation)
          <li>
            <a href="{{ route('front.article.show', $relation->slug) }}">
              <i class="fa fa-link"></i>{{ $relation->title }}
              <div class="relation-time"><time>{{ $relation->created_at }}</time></div>
            </a>
          </li>
        @endforeach
      </ul>
    </section>
  @endif
@stop
