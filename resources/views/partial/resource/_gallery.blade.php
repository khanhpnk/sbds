@if (0 < count($model->images) || !empty($model->youtube))
	@section('style')
		@parent
		<link rel='stylesheet' href='{{ asset('css/jssor.slider.css') }}'/>
	@stop

	@section('javascript')
		@parent
		<script src='{{ asset('js/jssor.slider.js') }}'></script>
		<script src='{{ asset('vendor/jssor.slider/js/jssor.slider.mini.js') }}'></script>
		<script src='{{ asset('vendor/jssor.slider/js/jssor.player.ytiframe.min.js') }}'></script>
	@stop

	<section>
		<div id="slider1_container" class="jssor-slider">
			<!-- Loading Screen -->
			<div u="loading" class="slider-loading">
				<div class="slider-loading-filter"></div>
				<div class="slider-loading-background"></div>
			</div>

			<div u="slides" class="slider-container">
				@if (!empty($model->youtube))
					<div>
						<div u="player" class="slider-player">
							<iframe pHandler="ytiframe" pHideControls="0" width="675" height="402" style="z-index: 0;" url="{{ $model->youtube }}" frameborder="0" scrolling="no"></iframe>
							<div u="cover" class="videoCover"></div><!-- play cover begin (optional, can remove play cover) -->
						</div>
					</div>
				@endif
				@foreach ($model->images as $image)
					<div>
						<img u="image" src="{{ ImageHelper::url($resource, $model->user_id, $image, \Library\Image::LARGE) }}" />
						<img u="thumb" src="{{ ImageHelper::url($resource, $model->user_id, $image, \Library\Image::SMALL) }}" />
					</div>
				@endforeach
			</div>

			<span u="arrowleft" class="jssora05l" style="top: 188px; left: 16px;"></span>
			<span u="arrowright" class="jssora05r" style="top: 188px; right: 16px"></span>

			<div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
				<div u="slides" style="cursor: default;">
					<div u="prototype" class="p">
						<div class=w><div u="thumbnailtemplate" class="t"></div></div>
						<div class=c></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endif