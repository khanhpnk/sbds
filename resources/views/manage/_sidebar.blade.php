<div class="user-head">
  <div class="user-head-avatar">
    <a href="#">
      <img  width="60" hieght="60" alt="avatar" class="img-rounded" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
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
    <li><a href="#"><i class="fa fa-inbox"></i>Hộp tin đến</a></li>
    <li><a href="#"><i class="fa fa-envelope-o"></i>Hộp tin đi</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li class="user-nav-header">Đăng tin</li>
    <li><a href="#"><i class="fa fa-inbox"></i>Chính chủ đăng tin</a></li>
    <li><a href="#"><i class="fa fa-inbox"></i>Môi giới đăng tin</a> </li>
    <li><a href="#"><i class="fa fa-inbox"></i>Dự án đăng tin</a></li>
    <li><a href="#"><i class="fa fa-inbox"></i>Quản lý tin đã đăng</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li class="user-nav-header">Quản lý tài khoản</li>
    <li><a href="#"><i class="fa fa-inbox"></i>Thông tin cá nhân</a></li>
    <li><a href="{{ route('user.password.edit') }}"><i class="fa fa-inbox"></i>Đổi mật khẩu</a> </li>
    <li><a href="#"><i class="fa fa-inbox"></i>Hộp tin nhắn</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li class="user-nav-header">Hướng dẫn</li>
    <li><a href="#"><i class="fa fa-inbox"></i>Hướng dẫn đăng tin</a> </li>
    <li><a href="#"><i class="fa fa-inbox"></i>youtube</a></li>
    <li class="user-nav-divider" role="separator"></li>
    <li><a href="#"><i class="fa fa-inbox"></i>Thoát</a></li>
  </ul>
</nav>