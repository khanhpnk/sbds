@if (0 < count($model->images))
	@section('style')
		@parent
		<style>
		html,body{height:100%;}
		.carousel,.item,.active{height:100%;}
		.carousel-inner{height:100%;}
		.fill{width:100%;height:100%;background-position:center;background-size:cover;}
		
		/* faster sliding speed */
		.carousel-inner > .item {
		    -webkit-transition: 0.3s ease-in-out left;
		    -moz-transition: 0.3s ease-in-out left;
		    -o-transition: 0.3s ease-in-out left;
		    transition: 0.3s ease-in-out left;
		}
		
		/* keep full widget on smaller screens */
		@media (max-width: 767px) { 
			body {
				padding-left: 0;
				padding-right: 0;
			}
		}
		</style>
	@stop

	@section('javascript')
		@parent
		<script>
		$(function() {
			
		});
		</script>
	@stop

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">	
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <?php $i = 0; ?>
		@foreach ($model->images as $image)
          <div class="item <?php if($i == 0) echo 'active' ?>">
	        <img src="{{ config('filesystems.disks.s3.endpoint') }}/banner/{{ $image }}" alt="...">
	      </div>
	      <?php $i++; ?>
		@endforeach
	  </div>
	
	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
@endif