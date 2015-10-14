@section('javascript')
  @parent
  <script src="{{ asset('js/module/map.js') }}"></script>
  <script src="{{ asset('js/module/location.js') }}"></script>
  <script>
    $(function() {
      frontGooglemapModule.init();
      frontLocationModule.init();

      $(".collapse-search").on('click', function () {
        $(".form-search").toggleClass("collapse-search-in");
        $(".form-search-block").toggle();
      });

      $("#type").on("change", function () {
        var category = {};
        switch($(this).val()) {
          case '1':
            category = {!! HouseCategorySaleOption::getJsonOptions() !!}; break;
          case '2':
            category = {!! HouseCategoryRentOption::getJsonOptions() !!}; break;
          case '3':
            category = {!! ProjectCategoryOption::getJsonOptions() !!}; break;
        }

        $("#category").find("option:not(:first)").remove();
        $("#category").select2({
          minimumResultsForSearch: Infinity, allowClear: true, placeholder: " -- ", data: category
        });
      });

    });
  </script>
@stop

<div id="map-canvas" style="height: 500px; width: 100%;"></div>

<div class="form-search">
  <form class="form-inline" method="POST" action="{{ route('front.map.search') }}">
    <div class="form-search-block">
      @include('partial.form._select2', ['name' => 'city', 'label' => 'Tỉnh thành'])
      @include('partial.form._select2', ['name' => 'district', 'label' => 'Quận / huyện'])
      @include('partial.form._select2', ['name' => 'ward', 'label' => 'Xã / phường'])
      @include('partial.form._select2', ['name' => 'type', 'options' => [1 => 'NHÀ ĐẤT BÁN', 2 => 'NHÀ ĐẤT CHO THUÊ', 3 => 'DỰ ÁN']])
      @include('partial.form._select2', ['name' => 'category', 'label' => ' -- ', 'options' => HouseCategorySaleOption::getOptions()])
      <button type="submit" class="btn btn-default">SEARCH</button>
    </div>
    <button type="button" class="btn btn-info collapse-search"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></button>
  </form>
</div>

<div class="infowindow-placeholder" style="display: none;">
  <div class="iw-container">
    <h1 class="iw-name">::NAME</h1>
    <div class="iw-content">
      <img class="iw-image" src="" alt="..." height="" width="510" class="img-responsive">
    </div>
  </div>
</div>