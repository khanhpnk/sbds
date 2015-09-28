@extends('layout')

@section('content')
	@if (0 < count($companies))
		<section class="list">
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($companies as $company)
						@include('companies._article', ['model' => $company,
													  'col' => 4, 'iw' => 200, 'ih' => 150])
					@endforeach
				</div>
			</div>
		</section>
		<nav class="simple-pagination">{!! $companies->render() !!}</nav>
	@else
		Không có dữ liệu!
	@endif
@stop

@section('breadcrumb')
  <li class="active">{{ TextHelper::resource(ResourceOption::CONG_TY) }}</li>
@stop
@section('meta_title'){{ TextHelper::resource(ResourceOption::CONG_TY) }}@stop
@section('meta_description'){{ TextHelper::resource(ResourceOption::CONG_TY) }}@stop