@extends('manage.layout')

@section('meta_title')
  Dự án đăng tin
@stop

@section('title')
  Dự án đăng tin
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.project.store') }}" method="POST" role="form" id="projectForm">
    @include('manage.house.partial.project._form', [
      'submitBtnText' => 'Đăng tin ngay',
      'checkUniqueUrl' => route('project.unique')
    ])
  </form>
@stop

@section('content')
  <h1>Tạo mới bài viết</h1>
  
  {!! Form::open(['url' => 'admin/article', 'role' => 'form', 'files' => true]) !!}
    @include ('admin.articles._form', ['submitButtonText' => 'Thêm mới'])
  {!! Form::close() !!}
@stop
