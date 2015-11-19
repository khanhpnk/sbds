<article class="col-md-6">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ UrlHelper::show(ResourceOption::DU_AN, $model->slug) }}" title="{{ $model->title }}">
        <img width="429" height="290" src="{{ ImageHelper::avatar(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-big">
      <header>
        <h3 class="thumb-header-big">
          <span class="thumb-type">Dự án</span>
          <a href="{{ UrlHelper::show(ResourceOption::DU_AN, $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
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
      <div class="pull-left">{{ $model->start_date }}</div>
    </footer>
  </div>
</article>