@extends('layout')

@section('content')
	<section>
		<div class="thumb thumb-br-default clearfix">
			<div class="row">
				@foreach ($houses as $house)
					@include('partial._article', ['model' => $house,
																						'col' => 4,
																						'imgWidth' => 200,
																						'caption' => 'Chính chủ'])
				@endforeach
			</div>
		</div>
	</section>

	<nav class="simple-pagination">{!! $houses->render() !!}</nav>
@stop
