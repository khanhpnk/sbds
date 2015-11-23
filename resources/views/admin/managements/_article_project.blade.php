<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ projectShowUrl($model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 206 }}" height="{{ $iw or 150 }}" src="{{ ImageHelper::avatar(ResourceOption::DU_AN, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
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
      <div class="pull-left">{{ $model->start_date }}</div>
    </footer>

    <form accept-charset="UTF-8" action="{{url('quan-tri/up-bai', [$type, $model->id, 1]) }}" class="form-delete" method="POST" role="form">
      <input type="hidden" name="_method" value="PUT">
      {!! csrf_field() !!}
      <button class="btn btn-primary" type="submit" role="button">Duyệt</button>
    </form>
    <form accept-charset="UTF-8" action="{{url('quan-tri/up-bai', [$type, $model->id, 0]) }}" class="form-delete" method="POST" role="form">
      <input type="hidden" name="_method" value="PUT">
      {!! csrf_field() !!}
      <button class="btn btn-primary" type="submit" role="button">Không duyệt</button>
    </form>
  </div>
</article>