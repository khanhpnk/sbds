@section('javascript')
	@parent
	<script>
		$(function() {
			@if (is_null($company))
				// by default in css config display house form, change to display company form
				$('#collapseOne').collapse('show');
				$('#collapseTwo').collapse('hide');

				companyModule.setCheckUniqueUrl("{{ route('company.unique') }}");
			@else
				companyModule.setCheckUniqueUrl("{{ route('company.unique', ['id' => $company->id]) }}");
			@endif

			imageModule.setAvatarUrl("{{ CompanyHelper::avatar(isset($company->avatar) ? $company->avatar : '')  }}");
			companyModule.init();

			$('#accordion').on('show.bs.collapse', function () {
				$('#accordion .in').collapse('hide');
			});
		});
	</script>
	<script src="{{ asset('js/manage/company.js') }}"></script>
@stop

<form accept-charset="UTF-8" enctype="multipart/form-data" method="POST" action="{{ route('company.save') }}" role="form" id="companyForm">
	@if (!is_null($company))
		<input type="hidden" name="_method" value="PUT">
	@endif
	{!! csrf_field() !!}

	<a class="btn btn-main" id="avatar" data-jfiler-name="avatar" data-jfiler-extensions="jpg, jpeg, png, gif" autocomplete="off"><i class="icon-jfi-paperclip"></i> Tải ảnh đại diện</a>

	@include('partial.form._text', ['model' => $company, 'name' => 'title', 'label' => 'Tên công ty'])
	@include('partial.form._textarea', ['model' => $company, 'name' => 'short_description', 'label' => 'Giới thiệu ngắn gọn', 'rows' => 4])
	@include('partial.form._textarea', ['model' => $company, 'name' => 'description', 'label' => 'Giới thiệu chi tiết', 'rows' => 8])
	<button type="submit" class="btn btn-primary btn-block" autocomplete="off">Xác nhận</button>
</form>