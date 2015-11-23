<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ projectShowUrl($model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 208 }}" height="{{ $ih or 156 }}" src="{{ ImageHelper::avatar(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <span class="thumb-type">Dự án</span>
          <a href="{{ projectShowUrl($model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      <address class="thumb-address">
        @include('partial.resource._location')
      </address>

    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">Mã số:0{{ $model->id }}</div>
      <div class="pull-right">{{ $model->start_date }}</div>
    </footer>
  </div>
</article>