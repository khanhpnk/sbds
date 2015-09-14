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