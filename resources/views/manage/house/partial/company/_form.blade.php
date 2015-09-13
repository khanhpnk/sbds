@section('javascript')
	@parent
	<script>
		$(function() {
			@if (is_null($company))
				companyModule.setIsEdit(false);
				companyModule.setCheckUniqueUrl("{{ route('company.unique') }}");
			@else
				companyModule.setIsEdit(true);
				companyModule.setCheckUniqueUrl("{{ route('company.unique', ['id' => $company->id]) }}");
			@endif
			companyModule.init();
		});
	</script>
	<script src="{{ asset('js/manage/company.js') }}"></script>
@stop

@include('partial.form._text', ['model' => $company,
																'name' => 'title',
																'label' => 'Tên công ty'])
@include('partial.form._textarea', ['model' => $company,
																		'name' => 'short_description',
																		'label' => 'Giới thiệu ngắn gọn',
																		'rows' => 4])
@include('partial.form._textarea', ['model' => $company,
																		'name' => 'description',
																		'label' => 'Giới thiệu chi tiết',
																		'rows' => 8])
<button type="submit" class="btn btn-primary btn-block" autocomplete="off">Xác nhận</button>
