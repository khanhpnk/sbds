<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ route('front.company.show', $model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 207 }}" height="{{ $iw or 150 }}" src="{{ ImageHelper::getCompanyAvatar($model->avatar) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <span class="thumb-type">Công ty</span>
          <a href="{{ route('front.company.show', $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>
    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">Mã số:0{{ $model->id }}</div>
      <div class="pull-right">{{ $model->created_at }}</div>
    </footer>
  </div>
</article>