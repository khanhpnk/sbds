<button type="button" class="btn" onclick="history.go(-1)">« Back</button>

<div class="form-group">
  <label for="slug">Hiển thị:</label>
  <label class="radio-inline">{!! Form::radio('status', '1', true) !!}Hiện thị</label>
  <label class="radio-inline">{!! Form::radio('status', '0') !!}Ẩn</label>
</div>

<div class="form-group">
  <label for="title">Tên bài viết:</label>
  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Tên bài viết']) !!}
</div>

<div class="form-group">
  <label for="content">Nội dung:</label>
  {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  <button type="submit" class="btn btn-lg btn-primary btn-block">{{ $submitButtonText }}</button>
</div>

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