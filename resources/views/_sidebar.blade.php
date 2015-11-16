@yield('contactInfo')

@yield('sidebarHook')

<section class="recommend">
  <header><h2 class="thumb-title thumb-title-recomend" style="background-color: red">Thiết kế thi công</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($designRecommend))
        @include('front.designs._article', ['model' => $designRecommend,
                                     'col' => 12, 'iw' => 184, 'ih' => 125])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend">Nhà đất bán</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($houseSaleRecommend))
        @include('houses._article', ['model' => $houseSaleRecommend,
                                     'resource' => ResourceOption::NHA_DAT,
                                     'col' => 12, 'iw' => 184, 'ih' => 125])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend">Nhà đất cho thuê</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($houseRentRecommend))
        @include('houses._article', ['model' => $houseRentRecommend,
                                     'resource' => ResourceOption::NHA_DAT,
                                     'col' => 12, 'iw' => 184, 'ih' => 125])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend">Dự án nổi bật</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($houseProjectRecommend))
        @include('projects._article', ['model' => $houseProjectRecommend,
                                      'resource' => ResourceOption::DU_AN,
                                      'col' => 12, 'iw' => 184, 'ih' => 125])
      @endif
    </div>
  </div>
</section>