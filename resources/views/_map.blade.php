@section('javascript')
  @parent
  <script src="{{ asset('js/module/map.js') }}"></script>
  <script src="{{ asset('js/module/location.js') }}"></script>
  <script>
    $(function() {
      frontGooglemapModule.init();
      frontLocationModule.init();

      $(".btn-collapse-search").on('click', function () {
        //$(".form-search").toggleClass("collapse-search-in");
        $(".form-filter").toggle();
        $(".form-search").toggle();
        $(".form-search-container").toggleClass('form-search-bottom form-search-top');
      });

      $("#type").on("change", function () {
        var category = {};
        switch($(this).val()) {
          case '1':
            category = {!! \App\Repositories\Resource\House\Sale\CategoryOptions::getJsonOptions() !!}; break;
          case '2':
            category = {!! \App\Repositories\Resource\House\Rent\CategoryOptions::getJsonOptions() !!}; break;
          case '3':
            category = {!! \App\Repositories\Resource\Project\CategoryOptions::getJsonOptions() !!}; break;
        }

        $("#category").find("option:not(:first)").remove();
        $("#category").select2({
          minimumResultsForSearch: Infinity, allowClear: true, placeholder: " -- ", data: category
        });
      });

    });
  </script>
@stop

<!-- Tab panes -->
<div class="tab-content">
  <div id="tab-map" class="tab-pane active" role="tabpanel">
    <div id="map-canvas" style="height: 500px; width: 100%;"></div>

    <div class="form-search-container form-search-bottom">
      <div class="form-search-inner clearfix">

        <form accept-charset="UTF-8" class="form-search form-inline pull-right" method="GET" action="/search" style="display: none">
          <input type="text" id="search" name="search" class="form-control" placeholder="Tìm kiếm">
          <button type="submit" class="btn"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
        </form>

        <button type="button" class="btn btn-info btn-collapse-search pull-right"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></button>

        <form class="form-filter form-inline pull-right" method="POST" action="{{ route('front.map.search') }}" id="searchForm">
          @include('partial.form._select2', ['name' => 'city', 'label' => 'Tỉnh thành'])
          @include('partial.form._select2', ['name' => 'district', 'label' => 'Quận / huyện'])
          @include('partial.form._select2', ['name' => 'ward', 'label' => 'Xã / phường'])
          @include('partial.form._select2', ['name' => 'type', 'options' => [1 => 'NHÀ ĐẤT BÁN', 2 => 'NHÀ ĐẤT CHO THUÊ', 3 => 'DỰ ÁN']])
          @include('partial.form._select2', ['name' => 'category', 'label' => ' -- ', 'options' => \App\Repositories\Resource\House\Sale\CategoryOptions::getOptions()])
          <button type="submit" class="btn btn-default">SEARCH</button>
        </form>

      </div>
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

  <!-- Nav tabs -->
  <div class="container" style="position: relative">
    <ul role="tablist" class="nav tab-map-image360">
      <li class="map" role="presentation"><a aria-controls="tab-map" data-toggle="tab" role="tab" aria-expanded="true" href="#tab-map">
          <img src="/images/map.gif" alt="" height="25" width="37">
          <div>Bản đồ</div>
        </a></li>
      <li class="i360" role="presentation" ><a aria-controls="tab-image360" data-toggle="tab" role="tab" aria-expanded="false" href="#tab-image360">
          <img src="/images/360.gif" alt="" height="25" width="37">
          <div>Ảnh 360</div>
        </a></li>
    </ul>
  </div>