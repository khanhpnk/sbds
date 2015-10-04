@extends('layout')

@section('meta_title'){{ $article->meta_title }}@stop
@section('meta_description'){{ $article->meta_description }}@stop

@section('breadcrumb')
  <li class="active">{{ $article->title }}</li>
@stop

@section('content')
  <article class="article">
    <header><h1 class="article-title">{{ $article->title }}</h1></header>
    {!! $article->description !!}
  </article>

  <hr>
  <div class="fb-comments" data-href="{{ route('front.article.show', ['slug' => $article->slug]) }}" data-width="675" data-numposts="2"></div>
  <hr>

  <section class="relation">
    <header><h1 class="relation-title">Các tin khác</h1></header>
    <ul>
      @foreach ($relations as $relation)
        <li><a href="{{ route('front.article.show', ['slug' => $relation->slug]) }}"><i class="fa fa-link"></i>{{ $relation->title }}</a></li>
      @endforeach
    </ul>
  </section>
@stop
