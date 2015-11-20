<article class="col-md-{{ $col or 4 }}">
  <div class="thumb-item-ds">
    <figure>
      <a class="thumb-img-ds" href="{{ route('admin.design.edit', $model->slug) }}" title="{{ $model->title }}">
        <img width="{{ $iw or 200 }}" height="{{ $iw or 150 }}" src="{{ ImageHelper::avatar(ResourceOption::THIET_KE, 1, $model->images) }}" alt="{{ $model->title }}">
      </a>
    </figure>
    <div class="thumb-content-ds">
      <header>
        <h3 class="thumb-title-ds">
          <a href="{{ route('admin.design.edit', $model->slug) }}" title="{{ $model->title }}">{{ $model->title }}</a>
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

    <a class="btn btn-view btn-primary" href="{{ route('front.design.show', $model->slug) }}" target="_blank" role="button">Xem</a>
    <a class="btn btn-edit btn-primary" href="{{ route('admin.design.edit', $model->slug) }}" role="button">Sửa</a>
    <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('admin.design.destroy', $model->slug) }}" class="form-delete" method="POST" role="form">
    <input type="hidden" name="_method" value="DELETE">
    {!! csrf_field() !!}
    <button class="btn btn-delete btn-primary" type="submit" role="button">Xóa</button>
    </form>
  </div>
</article>