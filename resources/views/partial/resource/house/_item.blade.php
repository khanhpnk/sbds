<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item">
    <figure>
      <a href="{{ houseShowUrl($model->slug) }}" title="{{ $model->title }}">
        <img class="thumb-img" width="{{ $iw or 208 }}" height="{{ $ih or 156 }}" src="{{ ImageHelper::avatar(ResourceOption::NHA_DAT, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
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

      <div class="thumb-icon clearfix">
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
    <div class="thumb-owner-type @if($model->owner_type) thumb-owner-type-cc @endif">{{ ownerTypeLabel($model->owner_type) }}</div>
  </div>
</article>