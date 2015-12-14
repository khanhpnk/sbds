
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse01" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a href="/" class="navbar-brand">
    <img width="40" height="40" src="{{ url('images/logo.png') }}" alt="House360.vn">
  </a>
</div>

<script>
  $(document).ready(function(){
    $(".nav-dropdown").hover(
        function() {
          $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
          $(this).toggleClass('open');
        },
        function() {
          $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
          $(this).toggleClass('open');
        }
    );
  });
</script>
<div class="container">
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbar-collapse01">
    <ul class="nav navbar-nav">{{-- Leave blank --}}</ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown nav-dropdown">
        <a href="/danh-sach-nha-dat" class="dropdown-toggle" data-toggle="dropdown">NHÀ ĐẤT BÁN</a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/ban-nha-rieng">Nhà riêng</a></li>
          <li><a href="/ban-can-ho">Căn hộ</a></li>
          <li><a href="/ban-nha-biet-thu-lien-ke">Nhà biệt thự, liền kề</a></li>
          <li><a href="/ban-nha-mat-pho">Nhà mặt phố</a></li>
          <li><a href="/ban-dat-nen-du-an">Đất nền dự án</a></li>
          <li><a href="/ban-dat">Đất</a></li>
          <li><a href="/ban-kho-nha-xuong">Kho, nhà xưởng</a></li>
          <li><a href="/ban-trang-trai-khu-nghi-duong">Trang trại, khu nghỉ dưỡng</a></li>
          <li><a href="/ban-the-loai-khac">Thể loại khác</a></li>
        </ul>
      </li>
      <li class="dropdown nav-dropdown">
        <a href="/danh-sach-nha-dat" class="dropdown-toggle" data-toggle="dropdown">CHO THUÊ</a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/cho-thue-nha-rieng">Nhà riêng</a></li>
          <li><a href="/cho-thue-can-ho">Căn hộ</a></li>
          <li><a href="/cho-thue-nha-biet-thu-lien-ke">Nhà biệt thự, liền kề</a></li>
          <li><a href="/cho-thue-nha-mat-pho">Nhà mặt phố</a></li>
          <li><a href="/cho-thue-dat-nen-du-an">Đất nền dự án</a></li>
          <li><a href="/cho-thue-dat">Đất</a></li>
          <li><a href="/cho-thue-kho-nha-xuong">Kho, nhà xưởng</a></li>
          <li><a href="/cho-thue-nha-tro">Nhà trọ</a></li>
          <li><a href="/cho-thue-van-phong">Văn phòng</a></li>
          <li><a href="/cho-thue-kiot-cua-hang">Kiot, cửa hàng</a></li>
          <li><a href="/cho-thue-the-loai-khac">Thể loại khác</a></li>
        </ul>
      </li>
      <li class="dropdown nav-dropdown">
        <a href="/du-an" class="dropdown-toggle" data-toggle="dropdown">DỰ ÁN</a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="/du-an-thuong-mai-dich-vu">Thương mại dịch vụ</a></li>
          <li><a href="/du-an-du-lich-nghi-duong">Du lịch nghỉ dưỡng</a></li>
          <li><a href="/du-an-can-ho-chung-cu">Căn hộ chung cư</a></li>
          <li><a href="/du-an-van-phong-cao-oc">Văn phòng cao ốc</a></li>
          <li><a href="/du-an-khu-cong-nghiep">Khu công nghiệp</a></li>
          <li><a href="/du-an-khu-do-thi-moi">Khu đô thị mới</a></li>
          <li><a href="/du-an-khu-phuc-hop">Khu phức hợp</a></li>
          <li><a href="/du-an-khu-dan-cu">Khu dân cư</a></li>
        </ul>
      </li>
      <li><a href="{{ route('front.company.index') }}">CÔNG TY</a></li>
      <li><a href="{{ route('front.design.index') }}">DỊCH VỤ</a></li>
      <li style="position: relative">
        @if (Auth::guest())
          <button class="btn btn-info navbar-btn" type="button" data-toggle="collapse" data-target="#collapsePosting" aria-expanded="false" aria-controls="collapsePosting">ĐĂNG TIN</button>
          <div class="collapse" id="collapsePosting" style="position: absolute; z-index: 10000">
            <div class="well">
              <!-- Nav tabs -->
              <ul role="tablist" class="nav nav-tabs">
                <li class="active" role="presentation"><a aria-controls="login" data-toggle="tab" role="tab" href="#login">ĐĂNG NHẬP</a></li>
                <li role="presentation" ><a aria-controls="register" data-toggle="tab" role="tab" href="#register">ĐĂNG KÝ</a></li>
                <li role="presentation" style="display: none;"><a aria-controls="resetpassword" data-toggle="tab" role="tab" href="#resetpassword">QUÊN MẬT KHẨU</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div aria-labelledby="home-tab" id="login" class="tab-pane active" role="tabpanel">
                  @include('partial.auth._login') <!-- Form Login -->
                </div>
                <div id="register" class="tab-pane" role="tabpanel">
                  @include('partial.auth._register') <!-- Form Register -->
                </div>
                <div id="resetpassword" class="tab-pane" role="tabpanel">
                  @include('partial.auth._password') <!-- Form Reset Password -->
                </div>
              </div>
            </div>
          </div>
        @else
          <div class="dropdown navbar-avatar">
            <a class="dropdown-toggle" id="userDropdownMenu" data-toggle="dropdown" data-target="#" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img src="{{ UserHelper::avatar() }}" width="36" height="36" class="img-responsive img-circle">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdownMenu">
              <li><a href="{{ route('m.owner.create') }}" class="navbar-link"><i class="fa fa-building-o"></i>Chính chủ đăng tin</a></li>
              <li><a href="{{ route('m.agency.create') }}" class="navbar-link"><i class="fa fa-balance-scale"></i>Môi giới đăng tin</a></li>
              <li><a href="{{ route('m.project.create') }}" class="navbar-link"><i class="fa fa-bank"></i>Dự án đăng tin</a></li>
              <li><a href="{{ route('manage.house.index') }}" class="navbar-link"><i class="fa fa-inbox"></i>Quản lý tin đã đăng</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('profile.edit') }}" class="navbar-link"><i class="fa fa-user-plus"></i>Thông tin cá nhân</a></li>
              <li><a href="{{ route('password.edit') }}" class="navbar-link"><i class="fa fa-cog"></i>Đổi mật khẩu</a></li>
              <li><a href="{{ route('message.index', 'inbox') }}" class="navbar-link">Hộp tin nhắn</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/ajax-auth/logout" class="navbar-link">Thoát</a></li>
            </ul>
          </div>
        @endif
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div>

    <div class="social-container" style="position: absolute; top: 15px; right: 20px">
      <a class="social-facebook" target="_blank" href="https://www.facebook.com/House360-402698543267613/timeline"></a>
      <a class="social-tweet" target="_blank" href="https://twitter.com/House360Vn"></a>
      <a class="social-google" target="_blank" href="https://plus.google.com/u/0/107148407005407875948/posts"></a>
    </div>
</ul>