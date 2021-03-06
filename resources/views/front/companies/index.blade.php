@extends('layout')

@section('content')
	@if (0 < count($companies))
		<header><h1 class="thumb-title">Công ty</h1></header>
		<section class="list">
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($companies as $company)
						@include('front.companies._article', ['model' => $company])
					@endforeach
				</div>
			</div>
		</section>
		<nav class="simple-pagination">{!! $companies->appends(Input::except('page'))->render() !!}</nav>
	@else
		Không có dữ liệu!
	@endif
@stop

@section('breadcrumb')
  <li class="active">Công ty</li>
@stop
@section('meta_title'){{ 'Công ty' }}@stop
@section('meta_description'){{ 'Công ty' }}@stop