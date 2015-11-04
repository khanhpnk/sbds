<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item">
    <figure>
      <a href="{{ route('front.company.show', $model->slug) }}" title="{{ $model->title }}">
        <img class="thumb-img" width="{{ $iw or 200 }}" height="150" src="{{ ImageHelper::getCompanyAvatar($model->avatar) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-cap">
      <header>
        <h3 class="thumb-header">
          <span class="thumb-type">Công ty</span>
          <a href="{{ route('front.company.show', $model->slug) }}">{{ $model->title }}</a>
        </h3>
      </header>
    </div>
  </div>
</article>