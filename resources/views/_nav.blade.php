<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse01" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a href="/" class="navbar-brand">
    <img width="20" height="20" src="/images/favicon.ico" alt="Brand">
  </a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navbar-collapse01">
  <ul class="nav navbar-nav">{{-- Leave blank --}}</ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="/">NHÀ ĐẤT BÁN</a></li>
    <li><a href="/">CHO THUÊ</a></li>
    <li><a href="/">DỰ ÁN</a></li>
    <li><a href="/">VẬT LIỆU</a></li>
    <li><a href="/">DỊCH VỤ</a></li>
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
                @include('partials.auth._login') <!-- Form Login -->
              </div>
              <div id="register" class="tab-pane" role="tabpanel">
                @include('partials.auth._register') <!-- Form Register -->
              </div>
              <div id="resetpassword" class="tab-pane" role="tabpanel">
                @include('partials.auth._password') <!-- Form Reset Password -->
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
            <li><a href="#" class="navbar-link">Chính chủ đăng tin</a></li>
            <li><a href="#" class="navbar-link">Môi giới đăng tin</a></li>
            <li><a href="#" class="navbar-link">Dự án đăng tin</a></li>
            <li><a href="#" class="navbar-link">Quản lý tin đã đăng</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" class="navbar-link">Quản lý tài khoản</a></li>
            <li><a href="#" class="navbar-link">Đổi mật khẩu</a></li>
            <li><a href="{{ route('message.index') }}" class="navbar-link">Hộp tin nhắn</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/ajax-auth/logout" class="navbar-link">Thoát</a></li>
          </ul>
        </div>
      @endif
    </li>
    <li>
      <div class="social-container navbar-social">
        <a class="social-facebook" target="_blank" href="https://www.facebook.com"></a>
        <a class="social-tweet" target="_blank" href="https://twitter.com"></a>
        <a class="social-google" target="_blank" href="https://plus.google.com"></a>
      </div>
    </li>
  </ul>
</div><!-- /.navbar-collapse -->