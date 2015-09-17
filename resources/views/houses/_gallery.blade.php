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
			<!-- Slides Container -->
			<div u="slides" class="slider-container">
				@if (!empty($house->youtube))
					<div>
						<div u="player" class="slider-player">
							<iframe pHandler="ytiframe" pHideControls="0" width="675" height="402" style="z-index: 0;" url="{{ $house->youtube }}" frameborder="0" scrolling="no"></iframe>
							<!-- play cover begin (optional, can remove play cover) -->
							<div u="cover" class="videoCover"></div>
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

			<!--#region Arrow Navigator Skin Begin -->
			<span u="arrowleft" class="jssora05l" style="top: 158px; left: 8px;"></span>
			<span u="arrowright" class="jssora05r" style="top: 158px; right: 8px"></span>
			<!--#endregion Arrow Navigator Skin End -->
			<!--#region Thumbnail Navigator Skin Begin -->
			<div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
				<div u="slides" style="cursor: default;">
					<div u="prototype" class="p">
						<div class=w><div u="thumbnailtemplate" class="t"></div></div>
						<div class=c></div>
					</div>
				</div>
			</div>
			<!--#region Thumbnail Navigator Skin End -->
		</div>
	</section>
@endif