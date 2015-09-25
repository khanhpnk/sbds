@extends('layout')

@section('content')
	@if (0 < count($houses))
		<section class="list">
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($houses as $house)
						@include('partial._article', ['model' => $house,
													  'isSale' => $house->is_sale,
													  'col' => 4, 'iw' => 200, 'ih' => 150])
					@endforeach
				</div>
			</div>
		</section>
		<nav class="simple-pagination">{!! $houses->render() !!}</nav>
	@else
		Không có dữ liệu!
	@endif
@stop

@section('breadcrumb')
  <li class="active">{{ $company->title }}</li>
@stop
@section('meta_title'){{ $company->meta_title }}@stop
@section('meta_description'){{ $company->meta_description }}@stop