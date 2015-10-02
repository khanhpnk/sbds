@section('javascript')
  @parent
  <script>
    $(function() {
      frontGooglemapModule.init("map-canvas");
      frontLocationModule.init();
    });
  </script>
@stop

<div id="map-canvas" style="height: 500px; width: 100%;"></div>

<div class="form-search">
  <form class="form-inline">
    @include('partial.form._select', ['name' => 'city', 'label' => 'Tỉnh thành'])
    @include('partial.form._select', ['name' => 'district', 'label' => 'Quận / huyện'])
    @include('partial.form._select', ['name' => 'ward', 'label' => 'Xã / phường'])
    @include('partial.form._select', ['name' => 'type', 'label' => '-- -- -- -- -- --',
                      'options' => ['DỰ ÁN', 'NHÀ ĐẤT BÁN', 'NHÀ ĐẤT CHO THUÊ', 'THIẾT KẾ THI CÔNG']])
    <button type="submit" class="btn btn-default">SEARCH</button>
    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></button>
  </form>
</div>

<div class="infowindow-placeholder" style="display: none;">
  <div class="iw-container">
    <h1 class="iw-name">::NAME</h1>
    <div class="iw-content">
      {{--<img src="/images/vendor/map/temp/banner.jpg" alt="..." height="" width="610" class="img-responsive">--}}
      <p class="iw-description">
        Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial
      </p>
      <b>Contact</b>
      <address class="iw-contact">
        ::ADDRESS<br>
        Phone: +351 234 320 600<br>
        E-mail: example@gmail.com<br>
        Website: www.hoc.vet
      </address>
    </div>
  </div>
</div>