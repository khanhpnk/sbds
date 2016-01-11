@extends('manage.layout')

@section('meta_title'){{ 'Quản lý banner' }}@stop
@section('meta_description'){{ 'Quản lý banner' }}@stop

@section('javascript')
  @parent
  <script>
    $(function() {
      @if (isset($banner->images))
        imagesModule.setImagesDbJSON({!! json_encode($banner->images) !!});
        imagesModule.setImageUrl("{{ ImageHelper::link(config('image.paths.banner')) }}");
      @endif

      bannerModule.init();
    });
  </script>
  <script src="{{ asset('js/admin/banner.js') }}"></script>
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('admin.banner.update') }}" method="POST" role="form" id="bannerForm">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="PUT">
    
	<a class="btn btn-form-upload" id="fileImage" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif" autocomplete="off"><i class="icon-jfi-paperclip"></i> Tải hình ảnh cho BĐS</a>
  	<input type="hidden" id="files_deleted" name="files_deleted">
    
    <button type="submit" class="btn btn-primary btn-block">Tải ảnh</button>
  </form>
@stop
