<div class="user-head">
  <div class="user-head-avatar">
    <a href="#">
      <img  width="60" hieght="60" alt="avatar" class="img-rounded" src="{{ UserHelper::avatar() }}">
    </a>
  </div>
  <div class="user-head-body">
    <h5 class="user-head-username"><a href="#">{{ str_limit(UserHelper::name(), 14, '') }}</a></h5>
    <a class="user-head-email" href="#">{{ str_limit(UserHelper::email(), 16, '') }}</a>
  </div>
  <button class="btn btn-info user-head-bnt-collapse" type="button" data-target="#collapseUserNav" aria-controls="collapseUserNav" data-toggle="collapse" aria-expanded="true">
    <i class="fa fa-chevron-down"></i>
  </button>
</div>

<nav class="collapse in" id="collapseUserNav" role="navigation">
  <ul class="nav user-nav">
    @can('admin')
      {{--<li><a href="{{ route('admin.company.index') }}">+ Công ty</a></li>--}}
      {{--<li><a href="{{ route('admin.banner.edit') }}">+ Banner</a></li>--}}

      <li class="user-nav-header">Quản trị tin up bài</li>
      {{--<li><a href="/quan-tri/up-bai?type=0">Tất cả tin mới</a></li>--}}
      <li @if(Request::is('quan-tri/up-bai/1*')) class="active" @endif><a href="/quan-tri/up-bai/1">Nhà đất bán</a></li>
      <li @if(Request::is('quan-tri/up-bai/2*')) class="active" @endif><a href="/quan-tri/up-bai/2">Nhà đất cho thuê</a></li>
      <li @if(Request::is('quan-tri/up-bai/3*')) class="active" @endif><a href="/quan-tri/up-bai/3">Dự án</a></li>

      <li class="user-nav-header">Quản trị quảng cáo</li>
      <li><a href="#">Đang quảng cáo</a></li>
      <li><a href="#">Quảng cáo đã hết hạn</a></li>
      <li><a href="#">Quảng cáo banner</a></li>
      <li><a href="#">Quảng cáo ảnh 360</a></li>

      <li class="user-nav-header">Quản trị thiết kế thi công</li>
      <li @if(Request::is('quan-tri/thiet-ke')) class="active" @endif><a href="{{ route('admin.design.index') }}">Dịch vụ đăng tin</a></li>
      <li @if(Request::is('quan-tri/thiet-ke/1')) class="active" @endif><a href="{{ route('admin.design.index', 1) }}">Thiết kế</a></li>
      <li @if(Request::is('quan-tri/thiet-ke/2')) class="active" @endif><a href="{{ route('admin.design.index', 2) }}">Nội thất</a></li>
      <li @if(Request::is('quan-tri/thiet-ke/3')) class="active" @endif><a href="{{ route('admin.design.index', 3) }}">Thi công</a></li>
      <li @if(Request::is('quan-tri/thiet-ke/4')) class="active" @endif><a href="{{ route('admin.design.index', 4) }}">Quản trị thông tin khác dịch vụ</a></li>

      <li class="user-nav-header">Thông tin chung HOUSE</li>
      <li @if(Request::is('m/user/profile*')) class="active" @endif><a href="{{ route('profile.edit') }}">Thay đổi thông tin cá nhân</a></li>
      <li @if(Request::is('m/user/password*')) class="active" @endif><a href="{{ route('password.edit') }}">Đổi mật khẩu</a> </li>
      <li @if(Request::is('quan-tri/bai-viet*')) class="active" @endif><a href="{{ route('admin.article.create', 'id=1') }}">Quản trị phần hướng dẫn</a> </li>
      <li @if(Request::is('m/message*')) class="active" @endif><a href="{{ route('message.index', 'inbox') }}">Hộp thư</a></li>

      <li><a href="/ajax-auth/logout" class="user-nav-big-link">Đăng xuất</a></li>
    @else
      <li class="user-nav-header">Đăng tin</li>
      <li @if(Request::is('m/owner/*')) class="active" @endif><a href="{{ route('m.owner.create') }}">Chính chủ đăng tin</a></li>
      <li @if(Request::is('m/agency/*')) class="active" @endif><a href="{{ route('m.agency.create') }}">Môi giới đăng tin</a> </li>
      <li @if(Request::is('m/project/*')) class="active" @endif><a href="{{ route('m.project.create') }}">Dự án đăng tin</a></li>
      <li @if(Request::is('m/danh-sach-nha-dat')) class="active" @endif><a href="{{ route('manage.house.index') }}">Quản lý đăng tin</a></li>

      <li class="user-nav-header">Thông tin chung HOUSE</li>
      <li @if(Request::is('m/user/profile*')) class="active" @endif><a href="{{ route('profile.edit') }}">Thay đổi thông tin cá nhân</a></li>
      <li @if(Request::is('m/user/password*')) class="active" @endif><a href="{{ route('password.edit') }}">Đổi mật khẩu</a> </li>
      <li @if(Request::is('m/message*')) class="active" @endif><a href="{{ route('message.index', 'inbox') }}">Hộp thư</a></li>

      <li><a href="/ajax-auth/logout" class="user-nav-big-link">Đăng xuất</a></li>
    @endcan
  </ul>

  <section>
    <header><h2 class="thumb-title thumb-title-recomend">Nội quy đăng tin</h2></header>
    <div style="border: 1px solid #d5d8df; margin-bottom: 20px; padding: 6px 2px;">
      Mọi khách hàng đều có thể đăng tin miễn phí và không giới hạn trên house360.vn
    </div>
  </section>
</nav>