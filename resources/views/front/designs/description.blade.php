@extends('one_col_layout')

@section('breadcrumb')
  <li class="active">{{ $company->title }}</li>
@stop

@section('content')
  <article class="article">
    <header>
      <h1 class="article-title">{{ $company->title }}</h1>
      <div class="article-time"><time>{{ $company->created_at }}</time></div>
    </header>

    {!! $company->description !!}
  </article>

  <hr>
  <div class="fb-comments" data-href="{{ route('front.design.description', $company->slug) }}" data-width="675" data-numposts="2"></div>
  <hr>
@stop
