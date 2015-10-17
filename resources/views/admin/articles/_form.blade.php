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
<input type="hidden" name="category_id" value="{{ $catId }}">
@include('partial.form._text', ['model' => $article, 'name' => 'title', 'label' => 'Tiêu đề'])
@include('partial.form._textarea', ['model' => $article, 'name' => 'description', 'label' => 'Nội dung'])

<button type="submit" class="btn btn-primary btn-block">{{ $submitBtnText }}</button>



