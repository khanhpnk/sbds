@yield('contactInfo')

@yield('sidebarHook')

<section class="recommend">
  <header><h2 class="thumb-title thumb-title-recomend" style="background-color: red"><a href="/thiet-ke-thi-cong">Thiết kế thi công</a></h2></header>
  <div class="thumb clearfix">
    <div class="row">
      @if (!is_null($designRecommend))
        @include('front.designs._article', ['model' => $designRecommend, 'col' => 12, 'iw' => 193, 'ih' => 125])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend"><a href="/danh-sach-nha-dat?type=ban">Nhà đất bán</a></h2></header>
  <div class="thumb clearfix">
    <div class="row">
      @if (!is_null($houseSaleRecommend))
        @include('partial.resource.house._item', ['model' => $houseSaleRecommend, 'col' => 12, 'iw' => 193, 'ih' => 125])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend"><a href="/danh-sach-nha-dat?type=cho-thue">Nhà đất cho thuê</a></h2></header>
  <div class="thumb clearfix">
    <div class="row">
      @if (!is_null($houseRentRecommend))
        @include('partial.resource.house._item', ['model' => $houseRentRecommend, 'col' => 12, 'iw' => 193, 'ih' => 125])
      @endif
    </div>
  </div>

  <header><h2 class="thumb-title thumb-title-recomend"><a href="/du-an-noi-bat">Dự án nổi bật</a></h2></header>
  <div class="thumb clearfix">
    <div class="row">
      @if (!is_null($houseProjectRecommend))
        @include('partial.resource.project._item', ['model' => $houseProjectRecommend, 'col' => 12, 'iw' => 193, 'ih' => 125])
      @endif
    </div>
  </div>
</section>