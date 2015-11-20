<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ houseShowUrl($model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 206 }}" height="{{ $iw or 150 }}" src="{{ ImageHelper::avatar(ResourceOption::NHA_DAT, $model->user_id, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <a href="{{ houseShowUrl($model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
        </h3>
      </header>

      <address class="thumb-address">
        @include('partial.resource._location')
      </address>
    </div>
    <footer class="thumb-footer-ds clearfix">
      <div class="pull-left">{{ $model->start_date }}</div>
    </footer>

    <a class="btn btn-view btn-primary" href="{{ houseShowUrl($model->slug) }}" target="_blank" role="button">Xem</a>
    <a class="btn btn-edit btn-primary" href="{{ UrlHelper::edit(ConstHelper::URI_DU_AN, ['slug' => $model->slug]) }}" role="button">Sửa</a>
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ UrlHelper::destroy(ConstHelper::URI_DU_AN, ['slug' => $model->slug]) }}" class="form-delete" method="POST" role="form">
    <input type="hidden" name="_method" value="DELETE">
    {!! csrf_field() !!}
    <button class="btn btn-delete btn-primary" type="submit" role="button">Xóa</button>
    </form>
  </div>
</article>