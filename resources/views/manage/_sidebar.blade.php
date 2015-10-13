<div class="user-head">
  <div class="user-head-avatar">
    <a href="#">
      <img  width="60" hieght="60" alt="avatar" class="img-rounded" src="{{ UserHelper::avatar() }}">
    </a>
  </div>
  <div class="user-head-body">
    <h5 class="user-head-username"><a href="#">{{ UserHelper::name() }}</a></h5>
    <a class="user-head-email" href="#">{{ str_limit(UserHelper::email(), 16) }}</a>
  </div>
  <button class="btn btn-info user-head-bnt-collapse" type="button" data-target="#collapseUserNav" aria-controls="collapseUserNav" data-toggle="collapse" aria-expanded="true">
    <i class="fa fa-chevron-down"></i>
  </button>
</div>

<nav class="collapse in" id="collapseUserNav" role="navigation">
  @include('partial._user_nav')
</nav>