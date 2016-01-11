@if (0 < count($model->images))
	@section('style')
		@parent
	@stop

	@section('javascript')
		@parent
		<script>
		$(function() {
			var options = {};                            
	        var jssor_slider1 = new $JssorSlider$('slider1_container', options);

	        //responsive code begin
	        //you can remove responsive code if you don't want the slider scales
	        //while window resizing
	        function ScaleSlider() {
	            var parentWidth = $('#slider1_container').parent().width();
	            if (parentWidth) {
	                jssor_slider1.$ScaleWidth(parentWidth);
	            }
	            else
	                window.setTimeout(ScaleSlider, 30);
	        }
	        //Scale slider after document ready
	        ScaleSlider();
	                                        
	        //Scale slider while window load/resize/orientationchange.
	        $(window).bind("load", ScaleSlider);
	        $(window).bind("resize", ScaleSlider);
	        $(window).bind("orientationchange", ScaleSlider);
	        //responsive code end
		});
		</script>
		<script src='{{ asset('vendor/jssor.slider/js/jssor.slider.mini.js') }}'></script>
	@stop

	<section>
		<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
		    <!-- Slides Container -->
		    <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 600px; height: 300px;">
				@foreach ($model->images as $image)
	             	<div>
	                	<img u="image" src="{{ config('filesystems.disks.s3.endpoint') }}/banner/{{ \Library\Image::LARGE }}{{ $image }}" />
	            	</div>
				@endforeach
		    </div>
		    <!-- Trigger -->
		    <script>jssor_slider1_starter('slider1_container');</script>
		</div>
	</section>
@endif