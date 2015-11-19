<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ route('front.design.show', $model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 208 }}" height="{{ $ih or 150 }}" src="{{ ImageHelper::avatar(ResourceOption::THIET_KE, 1, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <a href="{{ route('front.design.show', $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      <address class="thumb-address">
        @include('partial.resource._location')
      </address>

    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">{{ $model->land_m2 }}m2</div>
      <div class="pull-right">Mã số:0{{ $model->id }}</div>
    </footer>
  </div>
</article>