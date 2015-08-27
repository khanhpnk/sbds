@section('javascript')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
    // CSRF protection for your AJAX based applications
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });
  </script>
  <script src="/js/layout.js"></script>
@show