@extends('layout')

@section('content')
	@if (0 < count($houses))
		<section>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($houses as $house)
						@include('partial._article', ['model' => $house,
													  'isSale' => IsSaleOption::CHO_THUE,
													  'col' => 4, 'iw' => 200, 'ih' => 150])
					@endforeach
				</div>
			</div>
		</section>
		<nav class="simple-pagination">{!! $houses->render() !!}</nav>
	@else
		Không có dữ liệu
	@endif
@stop

@section('breadcrumb')
	<li class="active">Nhà đất cho thuê</li>
@stop

@section('meta_title')
Nhà đất cho thuê
@stop

@section('meta_description')
Nhà đất cho thuê
@stop