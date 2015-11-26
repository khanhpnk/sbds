@extends('layout')

@section('meta_title') Dự án @stop
@section('meta_description') Dự án @stop

@section('breadcrumb')
	<li class="active">Dự án</li>
@stop

@section('content')

	<header><h1 class="thumb-title">Dự án</h1></header>
	@if (0 < count($projects))
		<section>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@include('partial.resource.project._item', ['model' => $project])
					@endforeach
				</div>
			</div>
		</section>
		<nav class="simple-pagination">{!! $projects->appends(Input::except('page'))->render() !!}</nav>
	@else
		Không có dữ liệu!
	@endif

@stop