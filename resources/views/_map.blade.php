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

<!-- Nav tabs -->
<ul role="tablist" class="nav nav-tabs tab-map-image360">
  <li class="active" role="presentation"><a aria-controls="tab-map" data-toggle="tab" role="tab" aria-expanded="true" href="#tab-map">Bản đồ</a></li>
  <li role="presentation" ><a aria-controls="tab-image360" data-toggle="tab" role="tab" aria-expanded="false" href="#tab-image360">Ảnh 360</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <div id="tab-map" class="tab-pane active" role="tabpanel">
    <div id="map-canvas" style="height: 500px; width: 100%;"></div>

    <div class="form-search">
      <form class="form-inline" method="POST" action="{{ route('front.map.search') }}" id="searchForm">
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
  </div>
  <div id="tab-image360" class="tab-pane" role="tabpanel">

    <div id="panoDIV" style="height: 500px;">
      <noscript>
        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="500px" id="/image360/imagedata/image">
          <param name="movie" value="/image360/imagedata/image.swf"/>
          <param name="allowFullScreen" value="true"/>
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="/image360/imagedata/image.swf" width="100%" height="500px">
            <param name="movie" value="imagedata/image.swf"/>
            <param name="allowFullScreen" value="true"/>
            <!--<![endif]-->
            <a href="http://www.adobe.com/go/getflash">
              <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player"/>
            </a>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object>
      </noscript>
    </div>
    <script type="text/javascript" src="/image360/imagedata/image.js"></script>
    <script type="text/javascript">
      embedpano({
        swf:"/image360/imagedata/image.swf"
        ,target:"panoDIV"
        ,passQueryParameters:true
      });
    </script>

  </div>
</div>