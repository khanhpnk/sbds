<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="@yield('meta_description', 'Sàn bất động sản')">
<meta name="keywords" content="@yield('meta_keywords', 'bất động sản, bán nhà, cho thuê, môi giới nhà đất')">
<title>@yield('meta_title', 'Sàn bất động sản')</title>
<link rel="shortcut icon" type="image/png" href="{{ url('favicon.png') }}" />

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Font Icon -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Select2 -->
<link href="{{ asset('vendor/select2-4.0.0/css/select2.min.css') }}" rel="stylesheet" />
<!-- Custom -->
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">
<link href="{{ asset('css/module.css') }}" rel="stylesheet">

<!-- Jquery -->
<script src="{{ asset('vendor/jquery-2.1.3.min.js') }}"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Google map -->
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyC0zFJ-aO5zV3JbpWA39423cwHBS28n9ws"></script>
<script>
  // CSRF protection for your AJAX based applications
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
  });
  var publicUrl = "{{ url() }}";
</script>
 @section('initmap')
  <script>
 	@if(!Request::is('thiet-ke-thi-cong*'))
	  $(function() {
 	    frontGooglemapModule.init();
 	  });
	@endif
  </script>
@show