{!! csrf_field() !!}

<div class="form-group">
  <label for="title">Tiêu đề</label>
  <input type="text" class="form-control" name="title" id="title" value="{{ $article->title or '' }}" placeholder="Tiêu đề">
</div>

@include('partial.form._textarea', [
  'model' => $article,
  'name' => 'description',
  'label' => 'Nội dung'
])

<div class="form-group">
  <button type="submit" class="btn btn-lg btn-primary btn-block">{{ $submitBtnText }}</button>
</div>

<button type="button" class="btn btn-default" onclick="history.go(-1)">« Back</button>

<!-- Footer Javascript -->
@section('javascript')
  <!-- Editor -->
  <script type="text/javascript" src="{{ asset('/vendor/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript">
    tinymce.init({
      selector : "textarea",
      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    }); 
  </script>
@endsection

