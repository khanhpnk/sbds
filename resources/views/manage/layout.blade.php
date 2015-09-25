<!DOCTYPE html>
<html>
<head>
  @include('_head')
  @section('style')
    <!-- Datepicker -->
    <link href="{{ asset('vendor/pickadate/lib/compressed/themes/default.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/lib/compressed/themes/default.date.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('vendor/select2-4.0.0/css/select2.min.css') }}" rel="stylesheet" />
    <!-- Image upload -->
    <link href="{{ asset('vendor/jquery.filer-master/css/jquery.filer.css') }}" rel="stylesheet" />
    <!-- Custom -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/manage/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/manage/form.css') }}" rel="stylesheet">
  @show
  @section('jshead')

  @show

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      @include('_nav')
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <aside class="col-md-3 sidebar">
        @include('manage._sidebar')
      </aside>
      <main class="col-md-9 main">
        @include('manage._main')
      </main>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      @include('_footer')
    </div>
  </footer>

  @section('javascript')
    <!-- Datepicker -->
    <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/translations/vi_VN.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('vendor/select2-4.0.0/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2-4.0.0/js/i18n/vi.js') }}"></script>
    <!-- Google map -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <!-- JQuery Validation -->
    <script src="{{ asset('vendor/jquery-validation-1.14.0/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation-1.14.0/localization/messages_vi.min.js') }}"></script>
    <!-- Image upload -->
    <script src="{{ asset('vendor/jquery.filer-master/js/jquery.filer.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('js/function.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
    <script src="{{ asset('js/manage/module/map.js') }}"></script>
    <script src="{{ asset('js/manage/module/location.js') }}"></script>
  <script src="{{ asset('js/manage/module/image.js') }}"></script>
  @show
</body>
</html>