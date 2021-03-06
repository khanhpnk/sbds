<article class="col-md-6">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ projectShowUrl($model->slug) }}" title="{{ $model->title }}">
        <img width="429" height="310" src="{{ ImageHelper::avatarLarge(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-big">
      <header>
        <h3 class="thumb-header-big">
          <span class="thumb-type">Dự án</span>
          <a href="{{ projectShowUrl($model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      <address class="thumb-address">
        @include('partial.resource._location')
      </address>

    </div>
    <div class="thumb-description">
      {!! nl2br(str_limit($model->description, 200)) !!}
    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">Mã số:0{{ $model->id }}</div>
      <div class="pull-right">{{ $model->start_date }}</div>
    </footer>
  </div>
</article>