@extends('manage.layout')

@section('meta_title'){{ 'Tạo thiết kế thi công mới' }}@stop
@section('meta_description'){{ 'Tạo thiết kế thi công mới' }}@stop

@section('javascript')
  @parent
  <script src="{{ asset('js/admin/design.js') }}"></script>
@endsection

@section('content')
<form accept-charset="UTF-8" action="{{ route('admin.article.store') }}" method="POST" role="form" id="designForm">
  {!! csrf_field() !!}

  <div id="form-fieldset1" class="form-fieldset">
    <fieldset>
      <legend>Bước 1/3</legend>

      @include('partial.form._select', [
        'name' => 'category',
        'label' => 'Chọn danh mục thiết kế thi công',
        'options' => [
          '' => '-- -- --',
          '1' => 'Kiến trúc',
          '2' => 'Nội thất',
          '3' => 'Thi công'
        ]
      ])

      <div class="form-group">
        <button type="button" class="btn btn-primary btn-block form-open1">Tiếp theo <span class="fa fa-arrow-right"></span></button>
      </div>
    </fieldset>
  </div>

  <div id="form-fieldset2" class="form-fieldset" style="display: none;">
    <fieldset>
      <legend>Bước 2/3</legend>

      @include('partial.form._select', [
        'name' => 'sub_category',
        'label' => 'Chọn kiểu thiết kế thi công'
      ])

      <div class="form-group">
        <button type="button" class="btn btn-primary btn-block form-open2">Tiếp theo <span class="fa fa-arrow-right"></span></button>
        <button type="button" class="btn btn-warning btn-block form-back2"><span class="fa fa-arrow-left"></span> Quay lại</button>
      </div>
    </fieldset>
  </div>

  <div id="form-fieldset3" class="form-fieldset" style="display: none;">
    <fieldset>
      <legend>Step 3 of 3</legend>

      <div class="row">
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'designers',
            'label' => 'Tên người thiết kế'
           ])
        </div>
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'designers_furniture',
            'label' => 'Tên người thiết kế nội thất'
          ])
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'supervisor',
            'label' => 'Tên người giám sát'
          ])
        </div>
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'year',
            'label' => 'Năm thiết kế'
          ])
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'size1',
            'label' => 'Diện tích lô đất'
           ])
        </div>
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'size2',
            'label' => 'Diện tích xây dựng'
          ])
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'number_of_floors',
            'label' => 'Số tầng'
          ])
        </div>
        <div class="col-md-6">
          @include('partial.form._text', [
            'name' => 'size3',
            'label' => 'Bề rộng mặt tiền'
          ])
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
        <button type="button" class="btn btn-warning btn-block form-back3"><span class="fa fa-arrow-left"></span> Quay lại</button>
      </div>
    </fieldset>
  </div>
</form>

@stop
