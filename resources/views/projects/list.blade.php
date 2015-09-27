@extends('layout')

@section('content')
	@if (0 < count($projects))
		<section class="list">
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@include('partial._article', ['model' => $project,
													  'resource' => ResourceOption::DU_AN,
													  'col' => 4, 'iw' => 200, 'ih' => 150])
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
  <li class="active">{{ TextHelper::resource(ResourceOption::DU_AN) }}</li>
@stop
@section('meta_title'){{ TextHelper::resource(ResourceOption::DU_AN) }}@stop
@section('meta_description'){{ TextHelper::resource(ResourceOption::DU_AN) }}@stop