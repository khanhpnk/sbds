<ul class="nav user-nav">
  @can('admin')
    <li class="user-nav-header">Quản trị</li>
    <li><a href="{{ route('admin.article.create', 'id=1') }}">+ Giới thiệu về house</a></li>
    <li><a href="{{ route('admin.article.create', 'id=2') }}">+ Tuyển dụng</a></li>
    <li><a href="{{ route('admin.article.create', 'id=3') }}">+ Nội quy đăng tin</a></li>
    <li><a href="{{ route('admin.article.create', 'id=4') }}">+ Hướng dẫn sử dụng</a></li>
    <li><a href="{{ route('admin.article.create', 'id=5') }}">+ Báo giá</a></li>
    <li><a href="{{ route('admin.article.create', 'id=6') }}">+ Hướng dẫn thanh toán</a></li>
    <li><a href="{{ route('admin.company.index') }}">+ Công ty</a></li>
    <li><a href="{{ route('admin.design.index') }}">+ Thiết kế thi công</a></li>
  @endcan
  <li class="user-nav-header">Đăng tin</li>
  <li @if(Request::is('m/owner/*')) class="active" @endif><a href="{{ route('m.owner.create') }}"><i class="fa fa-building-o"></i>Chính chủ đăng tin</a></li>
  <li @if(Request::is('m/agency/*')) class="active" @endif><a href="{{ route('m.agency.create') }}"><i class="fa fa-balance-scale"></i>Môi giới đăng tin</a> </li>
  <li @if(Request::is('m/project/*')) class="active" @endif><a href="{{ route('m.project.create') }}"><i class="fa fa-bank"></i>Dự án đăng tin</a></li>
  <li @if(Request::is('m/danh-sach-nha-dat')) class="active" @endif><a href="{{ route('manage.house.index') }}"><i class="fa fa-inbox"></i>Quản lý đăng tin</a></li>
  <li class="user-nav-header">Quản lý tài khoản</li>
  <li><a href="{{ route('profile.edit') }}"><i class="fa fa-user-plus"></i>Thông tin cá nhân</a></li>
  <li><a href="{{ route('password.edit') }}"><i class="fa fa-cog"></i>Đổi mật khẩu</a> </li>
  <li class="user-nav-header">Hộp tin</li>
  <li><a href="{{ route('message.index', 'inbox') }}"><i class="fa fa-envelope"></i>Hộp tin nhận</a></li>
  <li><a href="{{ route('message.index', 'sent') }}"><i class="fa fa-envelope-o"></i>Hộp tin gửi</a></li>
</ul>