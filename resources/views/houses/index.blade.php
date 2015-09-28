@extends('layout')

@section('content')
	@if (0 < count($houses))
		<section class="list">
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($houses as $house)
						@include('partial._article', ['model' => $house,
													  'resource' => ResourceOption::NHA_DAT,
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
  <li class="active">{{ IsSaleOption::getLabel($isSale) }}</li>
@stop
@section('meta_title'){{ IsSaleOption::getLabel($isSale) }}@stop
@section('meta_description'){{ IsSaleOption::getLabel($isSale) }}@stop