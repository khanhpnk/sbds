@extends('manage.layout')

@section('meta_title')
  Dự án đăng tin
@stop

@section('title')
  Dự án đăng tin
@stop

@section('content')
  <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.project.update', ['slug' => $project->slug]) }}" method="POST" role="form" id="projectForm">
    <input type="hidden" name="_method" value="PUT">
    @include('manage.house.partial.project._form', [
      'submitBtnText' => 'Cập nhật thay đổi',
      'checkUniqueUrl' => route('project.unique', ['id' => $project->id])
    ])
  </form>
@stop