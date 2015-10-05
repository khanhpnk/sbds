@extends('manage.layout')

@section('meta_title'){{ 'Tạo thiết kế thi công mới' }}@stop
@section('meta_description'){{ 'Tạo thiết kế thi công mới' }}@stop

@section('javascript')
  @parent
  <script>
    $(function() {
      @if (isset($project->images))
        imagesModule.setImagesDbJSON({!! json_encode($design->images) !!});
        imagesModule.setImageUrl("{{ ImageHelper::link(config('image.paths.design').'/'.$design->user_id) }}");
      @endif
      designModule.setCheckUniqueUrl("{{ route('design.unique') }}");
      designModule.init();
      locationModule.setLocationDbJSON({
        address: "{{ $design->address or '' }}",
        ward: "{{ $design->ward or '' }}",
        district: "{{ $design->district or '' }}",
        city: "{{ $design->city or '' }}"
      });

      mapModule.init("form-map-canvas");

    });
  </script>
  <script src="{{ asset('js/admin/design.js') }}"></script>
@endsection

@section('content')
<form accept-charset="UTF-8" action="{{ route('admin.article.store') }}" method="POST" role="form" id="designForm">
  {!! csrf_field() !!}

  @include('admin.design.designs._form_fieldset1')

  @include('admin.design.designs._form_fieldset2')

  @include('admin.design.designs._form_fieldset3')

</form>

@stop
