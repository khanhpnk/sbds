@extends('layout')

@section('javascript')
	@parent
	<script>
		$(function() {
			$('#testBtn').click(function() {
				$.ajax({
					url: "http://localhost:8000/test",
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
