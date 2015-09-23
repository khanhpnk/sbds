<section class="contact-info">
  <header><h3 class="contact-info-header">Thông tin liên hệ</h3></header>
  <ul>
    <li><i class="fa fa-home"></i>Ngõ 105 Láng Hạ, Đống Đa, Hà Nội</li>
    <li><i class="fa fa-phone-square"></i>04 66 836 456 - 0983 097 911</li>
    <li><i class="fa fa-envelope"></i>luongduy.hung@hoalanjsc.com</li>
    <li><i class="fa fa-fax"></i>(305) 555-4447</li>
    <li><i class="fa fa-facebook-official"></i>viethome360</li>
    <li><i class="fa fa-skype"></i>luongduyhung</li>
    <li><i class="fa fa-globe"></i>http:://hoalanstudies.edu.vn</li>
  </ul>
</section>
<section class="recommend">
  <div class="thumb thumb-br-default clearfix">
    <div class="thumb-caption">Nhà đất bán</div>
    <div class="row">
      @if (!is_null($houseSaleRecommend))
        @include('partial._article', ['model' => $houseSaleRecommend,
                                      'isSale' => IsSaleOption::BAN,
                                      'col' => 12, 'iw' => 195, 'ih' => 150])
      @endif
    </div>
    <div class="thumb-caption">Nhà đất cho thuê</div>
    <div class="row">
      @if (!is_null($houseRentRecommend))
        @include('partial._article', ['model' => $houseRentRecommend,
                                      'isSale' => IsSaleOption::CHO_THUE,
                                      'col' => 12, 'iw' => 195, 'ih' => 150])
      @endif
    </div>
    <div class="thumb-caption">Dự án nổi bật</div>
    <div class="row">
      @if (!is_null($houseProjectRecommend))
        @include('partial._article', ['model' => $houseProjectRecommend,
                                      'isSale' => IsSaleOption::CHO_THUE,
                                      'col' => 12, 'iw' => 195, 'ih' => 150])
      @endif
    </div>
  </div>
</section>