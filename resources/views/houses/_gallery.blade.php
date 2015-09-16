@section('style')
	@parent
	<link rel='stylesheet' href='{{ asset('vendor/unitegallery/css/unite-gallery.css') }}' type='text/css' />
@stop

@section('javascript')
	@parent
	<script>
		$(function() {
			$("#gallery").unitegallery();
		});
	</script>
	<script type='text/javascript' src='{{ asset('vendor/unitegallery/js/unitegallery.min.js') }}'></script>
	<script type='text/javascript' src='{{ asset('vendor/unitegallery/themes/compact/ug-theme-compact.js') }}'></script>
@stop

<div id="gallery" style="display:none;">
@foreach ($house->images as $image)
	<img alt="Preview Image 1"
			 src="{{ asset('/images/uploads/house/'.$image) }}"
			 data-image="{{ asset('/images/uploads/house/'.$image) }}">
@endforeach
</div>