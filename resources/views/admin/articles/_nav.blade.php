<p class="text-primary">Tạo bài viết mới: </p>
<div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
  <a role="button" class="btn btn-primary @if (1 == Input::get('id')) active @endif" href="{{ route('admin.article.create', 'id=1') }}">Về chúng tôi</a>
  <a role="button" class="btn btn-primary @if (2 == Input::get('id')) active @endif" href="{{ route('admin.article.create', 'id=2') }}">Tuyển dụng</a>
  <a role="button" class="btn btn-primary @if (3 == Input::get('id')) active @endif" href="{{ route('admin.article.create', 'id=3') }}">Nội quy</a>
  <a role="button" class="btn btn-primary @if (4 == Input::get('id')) active @endif" href="{{ route('admin.article.create', 'id=4') }}">Hướng dẫn</a>
  <a role="button" class="btn btn-primary @if (5 == Input::get('id')) active @endif" href="{{ route('admin.article.create', 'id=5') }}">Báo giá</a>
</div>
<hr>