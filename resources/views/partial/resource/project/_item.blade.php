<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ route('project.show', $model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 207 }}" height="{{ $ih or 150 }}" src="{{ ImageHelper::avatar(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <span class="thumb-type">Dự án</span>
          <a href="{{ route('project.show', $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      @include('partial.resource._location')

    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">{{ $model->start_date }}</div>
    </footer>
  </div>
</article>