<form accept-charset="UTF-8" action="" method="POST" role="form">
	<article class="col-md-{{ $col }}">
		<div class="thumb-item">
			@include('partial._house')

			<a class="btn btn-view btn-primary" href="{{ UrlHelper::show($resource, ['slug' => $model->slug]) }}" target="_blank" role="button">
				Xem
			</a>
			<a class="btn btn-edit btn-primary" href="submit" role="button">
				Sửa
			</a>
			<button class="btn btn-delete btn-primary" type="submit" role="button">
				Xóa
			</button>
	 </div>
	</article>
</form>