@if (0 < count($relations))
  <hr>

  <div class="table-responsive">
    <table class="table table-striped table-hover table-condensed">
      <tbody>
      @foreach ($relations as $article)
        <tr>
          <td>{{ str_limit($article->title, 56) }}</td>
          <td>
            <a href="{{ route('front.article.show', $article->slug) }}" target="_blank" class="btn btn-link" role="link">Xem</a>
            <a href="{{ route('admin.article.edit', $article->slug) }}" class="btn btn-link" role="link">Chỉnh sửa</a>
            <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('admin.article.destroy',  $article->slug) }}" class="form-delete" method="POST" role="form">
              <input type="hidden" name="_method" value="DELETE">
              {!! csrf_field() !!}
              <button class="btn btn-link" type="submit" role="link">Xóa</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endif

<hr>
<button type="button" class="btn btn-default" onclick="history.go(-1)">« Back</button>



