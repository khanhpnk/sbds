<article class="col-md-6">
  <div class="thumb-item">
    <figure>
      <a href="/nha-dat/{{ $model->slug }}" title="{{ $model->title }}">
        <img class="thumb-img" width="433" height="290" src="{{ ImageHelper::avatar(ResourceOption::NHA_DAT, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-big">
      <header>
        <h3 class="thumb-header-big">
          <span class="thumb-type">{{ saleLabel($model->is_sale) }}</span>
          <a href="/nha-dat/{{ $model->slug }}">{{ $model->title }}</a>
        </h3>
      </header>

      @include('partial.resource._location')

      <div class="thumb-icon-big clearfix">
        <div class="pull-left">
          <i class="fa fa-building-o"></i>{{ $model->floors }}
          <i class="fa fa-bed "></i>{{ $model->bedroom }}
        </div>
        <div class="thumb-m2 pull-right">{{ $model->m2 }}m2</div>
      </div>
    </div>
    <footer class="thumb-footer clearfix">
      <span class="thumb-price">{{ MoneyHelper::price($model->price, $model->money_unit, $model->is_sale) }}</span>
      <div class="thumb-date pull-right"><time>{{ $model->start_date }}</time></div>
    </footer>
  </div>
</article>