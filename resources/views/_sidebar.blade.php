<section>
  <ul class="contact-info">
    <li class="contact-info-header">Thông tin liên hệ</li>
    <li><a href="#"><i class="fa fa-home"></i>Ngõ 105 Láng Hạ, Đống Đa, Hà Nội</a></li>
    <li><a href="#"><i class="fa fa-phone-square"></i>04 66 836 456 - 0983 097 911</a></li>
    <li><a href="#"><i class="fa fa-envelope"></i>luongduy.hung@hoalanjsc.com</a></li>
    <li><a href="#"><i class="fa fa-fax"></i>(305) 555-4447</a></li>
    <li><a href="#"><i class="fa fa-facebook-official"></i>viethome360</a></li>
    <li><a href="#"><i class="fa fa-skype"></i>luongduyhung</a></li>
    <li><a href="#"><i class="fa fa-globe"></i>http:://hoalanstudies.edu.vn</a></li>
  </ul>
</section>
<section>
    @for ($j = 0; $j < 4; $j++)
      <div class="row">
        @include('partial.house._article', ['col' => 12, 'figcaption' => 'Nhà đất bán'])
      </div>
    @endfor
</section>