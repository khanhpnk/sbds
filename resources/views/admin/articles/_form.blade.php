<!-- Footer Javascript -->
@section('javascript')
  @parent
  <!-- Editor -->
  <script src="{{ asset('/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('js/admin/article.js') }}"></script>
  <script>
    $(function() {
      tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
      });

      articleModule.init("#articleForm");
    });
  </script>
@endsection

{!! csrf_field() !!}

<div class="btn-group btn-group-justified" data-toggle="buttons">
  @include('partial.form.group._radio', ['model' => $article, 'name' => 'category_id', 'label' => 'Về chúng tôi', 'value' => 1, 'default' => true])
  @include('partial.form.group._radio', ['model' => $article, 'name' => 'category_id', 'label' => 'Tuyển dụng', 'value' => 2])
  @include('partial.form.group._radio', ['model' => $article, 'name' => 'category_id', 'label' => 'Nội quy', 'value' => 3])
  @include('partial.form.group._radio', ['model' => $article, 'name' => 'category_id', 'label' => 'Hướng dẫn', 'value' => 4])
  @include('partial.form.group._radio', ['model' => $article, 'name' => 'category_id', 'label' => 'Báo giá', 'value' => 5])
</div>
<hr>

@include('partial.form._text', ['model' => $article, 'name' => 'title', 'label' => 'Tiêu đề'])
@include('partial.form._textarea', ['model' => $article, 'name' => 'description', 'label' => 'Nội dung'])

<button type="submit" class="btn btn-primary btn-block">{{ $submitBtnText }}</button>

@if (0 < count($relations))
  <section class="relation">
    <header><h1 class="relation-title">Các tin khác</h1></header>
    <ul class="relation-list">
      @foreach ($relations as $relation)
        <li>
          <a href="{{ route('admin.article.edit', $relation->slug) }}" class="relation-admin-edit">Chỉnh sửa</a>
          <a href="{{ route('front.article.show', $relation->slug) }}">
            <i class="fa fa-link"></i>{{ $relation->title }}
            <div class="relation-time"><time>{{ $relation->created_at }}</time></div>
          </a>
        </li>
      @endforeach
    </ul>
  </section>
@endif

<hr>
<button type="button" class="btn btn-default" onclick="history.go(-1)">« Back</button>



