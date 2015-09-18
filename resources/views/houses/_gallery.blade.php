@if (0 < count($house->images) || !empty($house->youtube))
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
				@if (!empty($house->youtube))
					<div>
						<div u="player" class="slider-player">
							<iframe pHandler="ytiframe" pHideControls="0" width="675" height="402" style="z-index: 0;" url="{{ $house->youtube }}" frameborder="0" scrolling="no"></iframe>
							<div u="cover" class="videoCover"></div><!-- play cover begin (optional, can remove play cover) -->
						</div>
					</div>
				@endif
				@foreach ($house->images as $image)
					<div>
						<img u="image" src="{{ asset('/images/uploads/house/'.$image) }}" />
						<img u="thumb" src="{{ asset('/images/uploads/house/thumb-'.$image) }}" />
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

			<!-- Cover Begin -->
			<div class="cover cover-tl"></div>
			<div class="cover cover-tr"></div>
			<div class="cover cover-bl"></div>
			<div class="cover cover-br"></div>

			<div class="cover cover-t"></div>
			<div class="cover cover-b"></div>
			<div class="cover cover-l"></div>
			<div class="cover cover-r"></div>
		</div>
	</section>
@endif