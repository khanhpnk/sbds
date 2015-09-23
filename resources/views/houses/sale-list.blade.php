@extends('layout')

@section('content')
	@if (0 < count($houses))
		<section>
			<div class="thumb thumb-br-default clearfix">
				<div class="row">
					@foreach ($houses as $house)
						@include('partial._article', ['model' => $house,
													  'isSale' => IsSaleOption::BAN,
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
	<li class="active">Nhà đất bán</li>
@stop

@section('meta_title')
Nhà đất bán
@stop

@section('meta_description')
Nhà đất bán
@stop