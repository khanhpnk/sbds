<div class="user-head">
  <div class="user-head-avatar">
    <a href="#">
      <img  width="60" hieght="60" alt="avatar" class="img-rounded" src="{{ UserHelper::avatar() }}">
    </a>
  </div>
  <div class="user-head-body">
    <h5 class="user-head-username"><a href="#">{{ UserHelper::name() }}</a></h5>
    <a class="user-head-email" href="#">{{ UserHelper::email() }}</a>
  </div>
  <button class="btn btn-info user-head-bnt-collapse" type="button" data-target="#collapseUserNav" aria-controls="collapseUserNav" data-toggle="collapse" aria-expanded="true">
    <i class="fa fa-chevron-down"></i>
  </button>
</div>

<nav class="collapse in" id="collapseUserNav" role="navigation">
  <ul class="nav user-nav">
    <li class="active"><a href="#"><i class="fa fa-pencil-square-o"></i>Soạn tin</a></li>
    <li><a href="#"><i class="fa fa-envelope"></i>Hộp tin đến</a></li>
    <li><a href="#"><i class="fa fa-envelope-o"></i>Hộp tin đi</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li class="user-nav-header">Đăng tin</li>
    <li><a href="{{ route('self.create') }}"><i class="fa fa-building-o"></i>Chính chủ đăng tin</a></li>
    <li><a href="#"><i class="fa fa-balance-scale"></i>Môi giới đăng tin</a> </li>
    <li><a href="#"><i class="fa fa-bank"></i>Dự án đăng tin</a></li>
    <li><a href="#"><i class="fa fa-inbox"></i>Quản lý đăng tin</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li class="user-nav-header">Quản lý tài khoản</li>
    <li><a href="{{ route('profile.edit', ['id' => Auth::user()->profile]) }}"><i class="fa fa-user-plus"></i>Thông tin cá nhân</a></li>
    <li><a href="{{ route('password.edit') }}"><i class="fa fa-cog"></i>Đổi mật khẩu</a> </li>
    <li><a href="#"><i class="fa fa-inbox"></i>Soạn tin</a></li>
    <li><a href="#"><i class="fa fa-inbox"></i>Hộp tin nhắn</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li class="user-nav-header">Hướng dẫn</li>
    <li><a href="#"><i class="fa fa-inbox"></i>Hướng dẫn đăng tin</a> </li>
    <li><a href="#"><i class="fa fa-video-camera"></i>Hướng dẫn đăng youtube</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li><a href="#"><i class="fa fa-inbox"></i>Thoát</a></li>
  </ul>
</nav>