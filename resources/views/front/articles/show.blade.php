@extends('layout')

@section('meta_title'){{ $article->meta_title }}@stop
@section('meta_description'){{ $article->meta_description }}@stop

@section('breadcrumb')
  <li class="active">{{ $article->title }}</li>
@stop

@section('content')
  <article>
    <h1>{{ $article->title }}</h1>
    {!! $article->description !!}
  </article>

  <hr>

  <section class="relation">
    <ul>
      @foreach ($relations as $relation)
        <li><a href="{{ route('front.article.show', ['slug' => $relation->slug]) }}"><i class="fa fa-link"></i>{{ $relation->title }}</a></li>
      @endforeach
    </ul>
  </section>
@stop
