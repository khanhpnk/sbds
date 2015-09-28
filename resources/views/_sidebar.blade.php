@yield('contactInfo')

<section class="recommend">
  {{--<div class="thumb-caption">Thiết kế thi công</div>--}}

  <header><h2 class="thumb-title thumb-title-recomend">Nhà đất bán</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($houseSaleRecommend))
        @include('houses._article', ['model' => $houseSaleRecommend,
                                     'resource' => ResourceOption::NHA_DAT,
                                     'col' => 12, 'iw' => 195])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend">Nhà đất cho thuê</h2></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @if (!is_null($houseRentRecommend))
        @include('houses._article', ['model' => $houseRentRecommend,
                                     'resource' => ResourceOption::NHA_DAT,
                                     'col' => 12, 'iw' => 195])
      @endif
    </div>
  </div>

  {{--<header><h2 class="thumb-title thumb-title-recomend">Dự án nổi bật</h2></header>--}}
  {{--<div class="thumb thumb-br-default clearfix">--}}
    {{--<div class="row">--}}
      {{--@if (!is_null($houseProjectRecommend))--}}
        {{--@include('partial._article', ['model' => $houseProjectRecommend,--}}
                                      {{--'resource' => ResourceOption::DU_AN,--}}
                                      {{--'col' => 12, 'iw' => 195, 'ih' => 150])--}}
      {{--@endif--}}
    {{--</div>--}}
  {{--</div>--}}
</section>