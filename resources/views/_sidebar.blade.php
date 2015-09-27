@yield('contactInfo')

<section class="recommend">
  {{--<div class="thumb-caption">Thiết kế thi công</div>--}}

  <header><h2 class="thumb-title thumb-title-recomend">Nhà đất bán</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($houseSaleRecommend))
        @include('partial._article', ['model' => $houseSaleRecommend,
                                      'resource' => ResourceOption::BAN,
                                      'col' => 12, 'iw' => 195, 'ih' => 150])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend">Nhà đất cho thuê</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($houseRentRecommend))
        @include('partial._article', ['model' => $houseRentRecommend,
                                      'resource' => ResourceOption::CHO_THUE,
                                      'col' => 12, 'iw' => 195, 'ih' => 150])
      @endif
    </div>
  </div>

  {{--<div class="thumb-caption">Dự án nổi bật</div>--}}
</section>