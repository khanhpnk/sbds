@extends('one_col_layout')

@section('meta_title') Dự án nổi bật @stop
@section('meta_description') Dự án nổi bật @stop

@section('breadcrumb')
	<li class="active">Dự án nổi bật</li>
@stop

@section('content')

	<header><h1 class="thumb-title">Dự án nổi bật</h1></header>
	{{-- */ $i = 1; /* --}}
	@if (0 < count($projects))
		<section>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($projects as $project)
						@if (in_array($i++, [1, 2, 11, 12]))
							@include('partial.resource.project._item_large', ['model' => $project])
						@else
							@include('partial.resource.project._item', ['model' => $project, 'col' => 3])
						@endif
					@endforeach
				</div>
			</div>
		</section>
		<nav class="simple-pagination">{!! $projects->appends(Input::except('page'))->render() !!}</nav>
	@else
		Không có dữ liệu!
	@endif

@stop

