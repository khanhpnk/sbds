@extends('layout')

@section('javascript')
	@parent
	<script>
		$(function() {
			$('#testBtn').click(function() {
				$.ajax({
					url: "http://ec2-52-74-174-89.ap-southeast-1.compute.amazonaws.com/sbds/public/test",
					type: "POST",
					dataType: 'json',
					data: {mydata : locationStorageJSON}
				}).done(function(data) {
					console.log(data);
				});
			});
		});
	</script>
@endsection

@section('content')
	<button type="button" class="btn btn-primary" id="testBtn">Test</button>
@stop
