<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item">
    <figure>
      <a href="{{ houseShowUrl($model->slug) }}" title="{{ $model->title }}">
        <img class="thumb-img" width="{{ $iw or 206 }}" height="150" src="{{ ImageHelper::avatar(ResourceOption::NHA_DAT, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-cap">
      <header>
        <h3 class="thumb-header">
          <span class="thumb-type">{{ saleTypeLabel($model->sale_type) }}</span>
          <a href="{{ houseShowUrl($model->slug) }}">{{ $model->title }}</a>
        </h3>
      </header>

      <address class="thumb-address">
        @include('partial.resource._location')
      </address>

      <div class="clearfix">
        <div class="pull-left">
          <i class="fa fa-building-o"></i>{{ $model->floors }}
          <i class="fa fa-bed "></i>{{ $model->bedroom }}
        </div>
        <div class="pull-right">
          <div class="thumb-m2">{{ $model->m2 }}m2</div>
          <div class="thumb-date"><time>{{ $model->start_date }}</time></div>
        </div>
      </div>
    </div>
    <footer class="thumb-footer clearfix">
      <span class="thumb-price">{{ MoneyHelper::price($model->price, $model->money_unit, $model->sale_type) }}</span>
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