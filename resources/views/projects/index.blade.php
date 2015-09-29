@extends('layout')

@section('content')
	@if (0 < count($projects))
		<section class="list">
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@include('projects._article', ['model' => $project, 'resource' => ResourceOption::DU_AN])
					@endforeach
				</div>
			</div>
		</section>
		<nav class="simple-pagination">{!! $projects->render() !!}</nav>
	@else
		Không có dữ liệu!
	@endif
@stop

@section('breadcrumb')
  <li class="active">Dự án</li>
@stop
@section('meta_title'){{ 'Dự án' }}@stop
@section('meta_description'){{ 'Dự án' }}@stop