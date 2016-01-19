@if (0 < count($model->images))
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